<?php

namespace App\Http\Controllers;

use App\Models\TbPt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login Travelin
     */
    public function TampilFormLoginFunction()
    {
        return view('auth.login');
    }

    /**
     * Memproses proses login pengguna
     *
     * Admin dapat langsung masuk.
     * PT harus memiliki status perusahaan "aktif"
     * sebelum diperbolehkan masuk ke sistem.
     */
    public function ProsesLoginFunction(Request $request)
    {
        // Validasi data login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:1',
        ]);

        // Mencoba melakukan login
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        // Membuat ulang session untuk keamanan
        $request->session()->regenerate();

        $user = Auth::user();

        // ==========================================
        // LOGIN ADMIN
        // ==========================================

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }


        // ==========================================
        // LOGIN PT TRAVEL
        // ==========================================

        if ($user->role === 'pt') {

            $dataPT = TbPt::where('id_user', $user->id)->first();

            // Jika data PT tidak ditemukan
            if (!$dataPT) {

                Auth::logout();

                return back()
                    ->withErrors([
                        'email' => 'Data perusahaan PT tidak ditemukan.',
                    ]);
            }

            // PT masih menunggu verifikasi
            if ($dataPT->status === 'pending') {

                Auth::logout();

                return back()
                    ->withErrors([
                        'email' => 'Akun PT Anda masih menunggu konfirmasi admin.',
                    ]);
            }

            // PT ditolak
            if ($dataPT->status === 'ditolak') {

                Auth::logout();

                return back()
                    ->withErrors([
                        'email' => 'Pendaftaran PT Anda ditolak oleh admin.',
                    ]);
            }

            // PT sudah aktif
            if ($dataPT->status === 'aktif') {
                return redirect()->route('pt.dashboard');
            }
        }


        // ==========================================
        // ROLE TIDAK DIKENALI
        // ==========================================

        Auth::logout();

        return back()
            ->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ]);
    }

    /**
     * Mengeluarkan pengguna dari sistem
     */
    public function LogoutFunction(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Anda berhasil keluar dari Travelin.');
    }
}