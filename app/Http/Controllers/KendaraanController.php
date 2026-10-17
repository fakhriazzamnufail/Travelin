<?php

namespace App\Http\Controllers;

use App\Models\TbKendaraan;
use App\Models\TbPt;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Menampilkan seluruh kendaraan milik PT yang sedang login.
     */
    public function TampilDataKendaraanFunction()
    {
        $dataPT = TbPt::where('id_user', auth()->id())->firstOrFail();

        $dataKendaraan = TbKendaraan::where('id_pt', $dataPT->id_pt)
            ->latest()
            ->get();

        return view('pt.kendaraan.index', compact(
            'dataPT',
            'dataKendaraan'
        ));
    }

    /**
     * Menampilkan form tambah kendaraan.
     */
    public function TampilFormTambahKendaraanFunction()
    {
        return view('pt.kendaraan.create');
    }

    /**
     * Menyimpan kendaraan baru milik PT yang sedang login.
     */
    public function SimpanKendaraanFunction(Request $request)
    {
        $dataPT = TbPt::where('id_user', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'no_polisi' => 'required|string|max:15|unique:tb_kendaraan,no_polisi',
            'merk' => 'required|string|max:50',
            'tipe' => 'required|string|max:50',
            'warna' => 'required|string|max:30',
            'kapasitas' => 'required|integer|min:1|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        TbKendaraan::create([
            'id_pt' => $dataPT->id_pt,
            'no_polisi' => $validated['no_polisi'],
            'merk' => $validated['merk'],
            'tipe' => $validated['tipe'],
            'warna' => $validated['warna'],
            'kapasitas' => $validated['kapasitas'],
            'tahun' => $validated['tahun'],
            'status' => 'aktif',
        ]);

        return redirect()
            ->route('pt.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kendaraan.
     */
    public function TampilFormEditKendaraanFunction(TbKendaraan $kendaraan)
    {
        $dataPT = TbPt::where('id_user', auth()->id())->firstOrFail();

        if ($kendaraan->id_pt !== $dataPT->id_pt) {
            abort(403, 'Anda tidak memiliki akses ke kendaraan ini.');
        }

        return view('pt.kendaraan.edit', compact(
            'kendaraan'
        ));
    }

    /**
     * Memperbarui data kendaraan milik PT.
     */
    public function UpdateKendaraanFunction(
        Request $request,
        TbKendaraan $kendaraan
    ) {
        $dataPT = TbPt::where('id_user', auth()->id())->firstOrFail();

        if ($kendaraan->id_pt !== $dataPT->id_pt) {
            abort(403, 'Anda tidak memiliki akses ke kendaraan ini.');
        }

        $validated = $request->validate([
            'no_polisi' => 'required|string|max:15|unique:tb_kendaraan,no_polisi,' .
                $kendaraan->id_kendaraan . ',id_kendaraan',
            'merk' => 'required|string|max:50',
            'tipe' => 'required|string|max:50',
            'warna' => 'required|string|max:30',
            'kapasitas' => 'required|integer|min:1|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $kendaraan->update($validated);

        return redirect()
            ->route('pt.kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    /**
     * Menghapus kendaraan milik PT.
     */
    public function HapusKendaraanFunction(TbKendaraan $kendaraan)
    {
        $dataPT = TbPt::where('id_user', auth()->id())->firstOrFail();

        if ($kendaraan->id_pt !== $dataPT->id_pt) {
            abort(403, 'Anda tidak memiliki akses ke kendaraan ini.');
        }

        $kendaraan->delete();

        return redirect()
            ->route('pt.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus.');
    }
}