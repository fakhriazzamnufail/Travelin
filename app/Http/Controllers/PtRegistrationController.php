<?php

namespace App\Http\Controllers;

use App\Models\TbPt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PtRegistrationController extends Controller
{
    /**
     * Menampilkan halaman formulir pendaftaran PT Travel
     */
    public function TampilFormRegistrasiPtFunction()
    {
        return view('auth.pt-register');
    }

    /**
     * Menyimpan data pendaftaran PT Travel ke database
     */
    public function SimpanRegistrasiPtFunction(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:1|confirmed',
            'nm_pt' => 'required|string|max:250',
            'telp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        DB::transaction(function () use ($validated) {

            // Membuat akun pengguna dengan role PT
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'pt',
            ]);

            // Membuat data perusahaan PT
            TbPt::create([
                'id_user' => $user->id,
                'nm_pt' => $validated['nm_pt'],
                'telp' => $validated['telp'],
                'alamat' => $validated['alamat'],
                'status' => 'pending',
            ]);
        });

        return redirect()
            ->route('pt.register')
            ->with(
                'success',
                'Pendaftaran berhasil. Akun dan perusahaan Anda sedang menunggu konfirmasi admin.'
            );
    }
}