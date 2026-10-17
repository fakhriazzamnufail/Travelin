<?php

namespace App\Http\Controllers;

use App\Models\TbPt;
use App\Models\TbKendaraan;
use Illuminate\Support\Facades\DB;


class PtDashboardController extends Controller
{
    /**
     * Menampilkan dashboard PT Travel
     */
    public function TampilDashboardPtFunction()
    {
        $dataPT = TbPt::where('id_user', auth()->id())->firstOrFail();

        // Statistik hanya menghitung data milik PT yang sedang login.
        $jumlahKendaraan = TbKendaraan::where('id_pt', $dataPT->id_pt)->count();
        $jumlahDriver = DB::table('tb_driver')
            ->where('id_pt', $dataPT->id_pt)
            ->count();

        // Modul perjalanan belum tersedia, jadi belum ada statistik perjalanan.
        $jumlahPerjalanan = 0;

        return view('pt.dashboard', compact(
            'dataPT',
            'jumlahKendaraan',
            'jumlahDriver',
            'jumlahPerjalanan'
        ));
    }
}