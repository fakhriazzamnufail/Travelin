<?php

namespace App\Http\Controllers;

use App\Models\TbPt;


class PtDashboardController extends Controller
{
    /**
     * Menampilkan dashboard PT Travel
     */
    public function TampilDashboardPtFunction()
    {
        $dataPT = TbPt::where('id_user', auth()->id())->first();

        return view('pt.dashboard', compact('dataPT'));
    }
}