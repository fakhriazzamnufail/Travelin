<?php

namespace App\Http\Controllers;

use App\Models\TbPt;
use App\Models\TbRute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RuteController extends Controller
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
     * Memastikan rute milik PT yang sedang login.
     */
    private function PeriksaKepemilikanRuteFunction(
        TbRute $rute,
        TbPt $dataPT
    ): void {
        abort_unless(
            (int) $rute->id_pt === (int) $dataPT->id_pt,
            403,
            'Anda tidak memiliki akses ke rute ini.'
        );
    }

    /**
     * Menampilkan daftar rute milik PT.
     */
    
    public function TampilDataRuteFunction()
        {
            $dataPT = $this->AmbilDataPtLoginFunction();

            $rute = TbRute::where('id_pt', $dataPT->id_pt)
                ->orderByDesc('id_rute')
                ->paginate(10);

            return view('pt.rute.index', compact('rute'));
        }


    /**
     * Menampilkan formulir tambah rute.
     */
    public function TampilFormTambahRuteFunction()
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        return view('pt.rute.create', compact('dataPT'));
    }

    /**
     * Menyimpan rute baru.
     */
    public function SimpanRuteFunction(Request $request)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $dataValid = $request->validate([
            'kota_asal' => ['required', 'string', 'max:100'],
            'kota_tujuan' => [
                'required',
                'string',
                'max:100',
                'different:kota_asal',
            ],
            'harga' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'estimasi_menit' => [
                'required',
                'integer',
                'min:1',
                'max:65535',
            ],
        ]);

        $dataValid['id_pt'] = $dataPT->id_pt;
        $dataValid['status'] = 'aktif';

        TbRute::create($dataValid);

        return redirect()
            ->route('pt.rute.index')
            ->with('success', 'Rute berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir edit rute.
     */
    public function TampilFormEditRuteFunction(TbRute $rute)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanRuteFunction($rute, $dataPT);

        return view('pt.rute.edit', compact(
            'dataPT',
            'rute'
        ));
    }

    /**
     * Memperbarui rute.
     */
    public function UpdateRuteFunction(
        Request $request,
        TbRute $rute
    ) {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanRuteFunction($rute, $dataPT);

        $dataValid = $request->validate([
            'kota_asal' => ['required', 'string', 'max:100'],
            'kota_tujuan' => [
                'required',
                'string',
                'max:100',
                'different:kota_asal',
            ],
            'harga' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'estimasi_menit' => [
                'required',
                'integer',
                'min:1',
                'max:65535',
            ],
            'status' => ['required', Rule::in(['aktif', 'nonaktif'])],
        ]);

        $rute->update($dataValid);

        return redirect()
            ->route('pt.rute.index')
            ->with('success', 'Rute berhasil diperbarui.');
    }

    /**
     * Menghapus rute milik PT.
     */
    public function HapusRuteFunction(TbRute $rute)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanRuteFunction($rute, $dataPT);

        $rute->delete();

        return redirect()
            ->route('pt.rute.index')
            ->with('success', 'Rute berhasil dihapus.');
    }
}
