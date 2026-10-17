<?php

namespace App\Http\Controllers;

use App\Models\TbPt;

class PtController extends Controller
{
    /**
     * Menampilkan seluruh data PT Travel
     *
     * Mengambil semua data PT dari database
     * beserta data pemiliknya dari tabel users.
     */
    public function TampilDataPtFunction()
    {
        $dataPT = TbPt::with('user')
            ->latest()
            ->get();

        return view('admin.pt.index', compact('dataPT'));
    }

    /**
     * Menampilkan detail PT Travel
     *
     * Menampilkan informasi perusahaan,
     * pemilik, dan status pendaftaran.
     */
    public function TampilDetailPtFunction(TbPt $pt)
    {
        $pt->load('user');

        return view('admin.pt.show', compact('pt'));
    }

    /**
     * Menyetujui pendaftaran PT Travel
     *
     * Mengubah status PT dari pending
     * menjadi aktif.
     */
    public function SetujuiPtFunction(TbPt $pt)
    {
        $pt->update([
            'status' => 'aktif',
        ]);

        return redirect()
            ->route('admin.pt.show', $pt->id_pt)
            ->with('success', 'PT Travel berhasil disetujui.');
    }

    /**
     * Menolak pendaftaran PT Travel
     *
     * Mengubah status PT menjadi ditolak.
     */
    public function TolakPtFunction(TbPt $pt)
    {
        $pt->update([
            'status' => 'ditolak',
        ]);

        return redirect()
            ->route('admin.pt.show', $pt->id_pt)
            ->with('success', 'Pendaftaran PT Travel ditolak.');
    }
}