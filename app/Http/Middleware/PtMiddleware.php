<?php

namespace App\Http\Middleware;

use App\Models\TbPt;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PtMiddleware
{
    /**
     * Memeriksa apakah pengguna adalah PT Travel
     * dan status perusahaannya sudah aktif.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Bukan akun PT
        if (auth()->user()->role !== 'pt') {
            abort(403, 'Halaman ini khusus untuk PT Travel.');
        }

        // Mengambil data PT berdasarkan akun yang login
        $dataPT = TbPt::where('id_user', auth()->id())->first();

        // Data PT tidak ditemukan
        if (!$dataPT) {
            auth()->logout();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Data PT Travel tidak ditemukan.',
                ]);
        }

        // PT belum aktif
        if ($dataPT->status !== 'aktif') {

            auth()->logout();

            if ($dataPT->status === 'pending') {
                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'Pendaftaran PT Travel masih menunggu konfirmasi admin.',
                    ]);
            }

            if ($dataPT->status === 'ditolak') {
                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'Pendaftaran PT Travel ditolak oleh admin.',
                    ]);
            }
        }

        // PT aktif → boleh masuk
        return $next($request);
    }
}