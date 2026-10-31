<?php

namespace App\Http\Controllers;

use App\Models\TbPt;
use App\Models\TbRute;
use App\Models\TbDriver;
use App\Models\TbJadwal;
use App\Models\TbKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Mengambil data PT yang sedang login.
     */
    private function AmbilDataPtLoginFunction(): TbPt
    {
        return TbPt::where('id_user', auth()->id())
            ->firstOrFail();
    }

    /**
     * Memastikan jadwal merupakan milik PT yang sedang login.
     */
    private function PeriksaKepemilikanJadwalFunction(
        TbJadwal $jadwal,
        TbPt $dataPT
    ): void {
        abort_unless(
            (int) $jadwal->id_pt === (int) $dataPT->id_pt,
            403,
            'Anda tidak memiliki akses ke jadwal ini.'
        );
    }

    /**
     * Menampilkan daftar jadwal milik PT.
     */
    public function TampilDataJadwalFunction()
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $jadwal = TbJadwal::with([
            'rute',
            'kendaraan',
            'driver',
        ])
            ->where('id_pt', $dataPT->id_pt)
            ->orderByDesc('tanggal_berangkat')
            ->orderByDesc('jam_berangkat')
            ->paginate(10);

        return view('pt.jadwal.index', compact(
            'dataPT',
            'jadwal'
        ));
    }

    /**
     * Menampilkan formulir tambah jadwal.
     */
    public function TampilFormTambahJadwalFunction()
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $dataRute = TbRute::where('id_pt', $dataPT->id_pt)
            ->where('status', 'aktif')
            ->orderBy('kota_asal')
            ->get();

        $dataKendaraan = TbKendaraan::where('id_pt', $dataPT->id_pt)
            ->where('status', 'aktif')
            ->orderBy('no_polisi')
            ->get();

        $dataDriver = TbDriver::where('id_pt', $dataPT->id_pt)
            ->where('status', 'aktif')
            ->orderBy('nm_driver')
            ->get();

        return view('pt.jadwal.create', compact(
            'dataPT',
            'dataRute',
            'dataKendaraan',
            'dataDriver'
        ));
    }

    /**
     * Memeriksa apakah driver atau kendaraan memiliki
     * jadwal lain yang waktunya bertabrakan.
     */
    private function PeriksaBentrokJadwalFunction(
        int $idDriver,
        int $idKendaraan,
        Carbon $waktuMulai,
        Carbon $waktuSelesai,
        ?int $idJadwal = null
    ): ?string {

        // Memeriksa bentrok jadwal driver.
        $bentrokDriver = DB::table('tb_jadwal as jadwal')
            ->join('tb_rute as rute', 'rute.id_rute', '=', 'jadwal.id_rute')
            ->where('jadwal.id_driver', $idDriver)
            ->where('jadwal.status', 'aktif')
            ->when($idJadwal, function ($query) use ($idJadwal) {
                $query->where('jadwal.id_jadwal', '!=', $idJadwal);
            })
            ->whereRaw(
                'TIMESTAMP(jadwal.tanggal_berangkat, jadwal.jam_berangkat) < ?',
                [$waktuSelesai->toDateTimeString()]
            )
            ->whereRaw(
                'DATE_ADD(
                    TIMESTAMP(jadwal.tanggal_berangkat, jadwal.jam_berangkat),
                    INTERVAL rute.estimasi_menit MINUTE
                ) > ?',
                [$waktuMulai->toDateTimeString()]
            )
            ->exists();

        if ($bentrokDriver) {
            return 'Driver sudah memiliki jadwal perjalanan pada waktu tersebut.';
        }

        // Memeriksa bentrok jadwal kendaraan.
        $bentrokKendaraan = DB::table('tb_jadwal as jadwal')
            ->join('tb_rute as rute', 'rute.id_rute', '=', 'jadwal.id_rute')
            ->where('jadwal.id_kendaraan', $idKendaraan)
            ->where('jadwal.status', 'aktif')
            ->when($idJadwal, function ($query) use ($idJadwal) {
                $query->where('jadwal.id_jadwal', '!=', $idJadwal);
            })
            ->whereRaw(
                'TIMESTAMP(jadwal.tanggal_berangkat, jadwal.jam_berangkat) < ?',
                [$waktuSelesai->toDateTimeString()]
            )
            ->whereRaw(
                'DATE_ADD(
                    TIMESTAMP(jadwal.tanggal_berangkat, jadwal.jam_berangkat),
                    INTERVAL rute.estimasi_menit MINUTE
                ) > ?',
                [$waktuMulai->toDateTimeString()]
            )
            ->exists();

        if ($bentrokKendaraan) {
            return 'Kendaraan sudah memiliki jadwal perjalanan pada waktu tersebut.';
        }

        return null;
    }

    /**
     * Menyimpan jadwal keberangkatan baru.
     */
    public function SimpanJadwalFunction(Request $request)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $dataValid = $request->validate([
            'id_rute' => [
                'required',
                'integer',
                Rule::exists('tb_rute', 'id_rute')
                    ->where('id_pt', $dataPT->id_pt)
                    ->where('status', 'aktif'),
            ],

            'id_kendaraan' => [
                'required',
                'integer',
                Rule::exists('tb_kendaraan', 'id_kendaraan')
                    ->where('id_pt', $dataPT->id_pt)
                    ->where('status', 'aktif'),
            ],

            'id_driver' => [
                'required',
                'integer',
                Rule::exists('tb_driver', 'id_driver')
                    ->where('id_pt', $dataPT->id_pt)
                    ->where('status', 'aktif'),
            ],

            'tanggal_berangkat' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'jam_berangkat' => [
                'required',
                'date_format:H:i',
            ],

            'harga' => [
                'required',
                'numeric',
                'min:0',
                'max:9999999999.99',
            ],
        ]);

        // Mengambil rute milik PT.
        $rute = TbRute::where('id_pt', $dataPT->id_pt)
            ->findOrFail($dataValid['id_rute']);

        // Menghitung waktu mulai dan selesai perjalanan.
        $waktuMulai = Carbon::parse(
            $dataValid['tanggal_berangkat'] . ' ' .
            $dataValid['jam_berangkat']
        );

        $waktuSelesai = $waktuMulai->copy()
            ->addMinutes((int) $rute->estimasi_menit);

        // Memeriksa bentrok driver dan kendaraan.
        $pesanBentrok = $this->PeriksaBentrokJadwalFunction(
            (int) $dataValid['id_driver'],
            (int) $dataValid['id_kendaraan'],
            $waktuMulai,
            $waktuSelesai
        );

        if ($pesanBentrok) {
            return back()
                ->withInput()
                ->withErrors([
                    'jam_berangkat' => $pesanBentrok,
                ]);
        }

        // Menyimpan jadwal.
        TbJadwal::create([
            'id_pt' => $dataPT->id_pt,
            'id_rute' => $dataValid['id_rute'],
            'id_kendaraan' => $dataValid['id_kendaraan'],
            'id_driver' => $dataValid['id_driver'],
            'tanggal_berangkat' => $dataValid['tanggal_berangkat'],
            'jam_berangkat' => $dataValid['jam_berangkat'],
            'harga' => $dataValid['harga'],
            'status' => 'aktif',
        ]);

        return redirect()
            ->route('pt.jadwal.index')
            ->with('success', 'Jadwal keberangkatan berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir edit jadwal.
     */
    public function TampilFormEditJadwalFunction(TbJadwal $jadwal)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanJadwalFunction($jadwal, $dataPT);

        // Pilihan aktif serta data yang sedang digunakan jadwal.
        $dataRute = TbRute::where('id_pt', $dataPT->id_pt)
            ->where(function ($query) use ($jadwal) {
                $query->where('status', 'aktif')
                    ->orWhere('id_rute', $jadwal->id_rute);
            })
            ->orderBy('kota_asal')
            ->get();

        $dataKendaraan = TbKendaraan::where('id_pt', $dataPT->id_pt)
            ->where(function ($query) use ($jadwal) {
                $query->where('status', 'aktif')
                    ->orWhere('id_kendaraan', $jadwal->id_kendaraan);
            })
            ->orderBy('no_polisi')
            ->get();

        $dataDriver = TbDriver::where('id_pt', $dataPT->id_pt)
            ->where(function ($query) use ($jadwal) {
                $query->where('status', 'aktif')
                    ->orWhere('id_driver', $jadwal->id_driver);
            })
            ->orderBy('nm_driver')
            ->get();

        return view('pt.jadwal.edit', compact(
            'dataPT',
            'jadwal',
            'dataRute',
            'dataKendaraan',
            'dataDriver'
        ));
    }

    /**
     * Memperbarui jadwal keberangkatan.
     */
    public function UpdateJadwalFunction(
        Request $request,
        TbJadwal $jadwal
    ) {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanJadwalFunction($jadwal, $dataPT);

        $dataValid = $request->validate([
            'id_rute' => [
                'required',
                'integer',
                Rule::exists('tb_rute', 'id_rute')
                    ->where('id_pt', $dataPT->id_pt)
                    ->where('status', 'aktif'),
            ],

            'id_kendaraan' => [
                'required',
                'integer',
                Rule::exists('tb_kendaraan', 'id_kendaraan')
                    ->where('id_pt', $dataPT->id_pt)
                    ->where('status', 'aktif'),
            ],

            'id_driver' => [
                'required',
                'integer',
                Rule::exists('tb_driver', 'id_driver')
                    ->where('id_pt', $dataPT->id_pt)
                    ->where('status', 'aktif'),
            ],

            'tanggal_berangkat' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'jam_berangkat' => [
                'required',
                'date_format:H:i',
            ],

            'harga' => [
                'required',
                'numeric',
                'min:0',
                'max:9999999999.99',
            ],

            'status' => [
                'required',
                Rule::in(['aktif', 'nonaktif', 'dibatalkan', 'selesai']),
            ],
        ]);

        $rute = TbRute::where('id_pt', $dataPT->id_pt)
            ->findOrFail($dataValid['id_rute']);

        $waktuMulai = Carbon::parse(
            $dataValid['tanggal_berangkat'] . ' ' .
            $dataValid['jam_berangkat']
        );

        $waktuSelesai = $waktuMulai->copy()
            ->addMinutes((int) $rute->estimasi_menit);

        // Hanya jadwal aktif yang perlu diperiksa bentrok.
        if ($dataValid['status'] === 'aktif') {
            $pesanBentrok = $this->PeriksaBentrokJadwalFunction(
                (int) $dataValid['id_driver'],
                (int) $dataValid['id_kendaraan'],
                $waktuMulai,
                $waktuSelesai,
                (int) $jadwal->id_jadwal
            );

            if ($pesanBentrok) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'jam_berangkat' => $pesanBentrok,
                    ]);
            }
        }

        $jadwal->update($dataValid);

        return redirect()
            ->route('pt.jadwal.index')
            ->with('success', 'Jadwal keberangkatan berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal milik PT.
     */
    public function HapusJadwalFunction(TbJadwal $jadwal)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanJadwalFunction($jadwal, $dataPT);

        $jadwal->delete();

        return redirect()
            ->route('pt.jadwal.index')
            ->with('success', 'Jadwal keberangkatan berhasil dihapus.');
    }
}
