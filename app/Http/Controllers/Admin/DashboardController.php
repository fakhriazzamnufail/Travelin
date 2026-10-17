<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin
     */
    public function TampilDashboardAdminFunction()
    {
        $jumlahPT = DB::table('tb_pt')->count();

        $jumlahPengguna = DB::table('users')->count();

        $jumlahKendaraan = DB::table('tb_kendaraan')->count();

        return view('admin.dashboard', compact(
            'jumlahPT',
            'jumlahPengguna',
            'jumlahKendaraan'
        ));
    }
}