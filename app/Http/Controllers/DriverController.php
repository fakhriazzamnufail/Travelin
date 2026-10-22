<?php

namespace App\Http\Controllers;

use App\Models\TbDriver;
use App\Models\TbPt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DriverController extends Controller
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
     * Memastikan driver milik PT yang sedang login.
     */
    private function PeriksaKepemilikanDriverFunction(
        TbDriver $driver,
        TbPt $dataPT
    ): void {
        abort_unless(
            (int) $driver->id_pt === (int) $dataPT->id_pt,
            403,
            'Anda tidak memiliki akses ke data driver ini.'
        );
    }

    /**
     * Menampilkan daftar driver milik PT.
     */
    public function TampilDataDriverFunction()
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $dataDriver = TbDriver::where('id_pt', $dataPT->id_pt)
            ->with('user')
            ->latest('id_driver')
            ->paginate(10);

        return view('pt.driver.index', compact(
            'dataPT',
            'dataDriver'
        ));
    }

    /**
     * Menampilkan formulir tambah driver.
     */
    public function TampilFormTambahDriverFunction()
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        return view('pt.driver.create', compact('dataPT'));
    }

    /**
     * Menyimpan akun pengguna dan data driver.
     */
    public function SimpanDriverFunction(Request $request)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $dataValid = $request->validate([
            'nm_driver' => ['required', 'string', 'max:100'],
            'nik' => ['required', 'string', 'max:20', 'unique:tb_driver,nik'],
            'telp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'no_sim' => ['required', 'string', 'max:30', 'unique:tb_driver,no_sim'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction(function () use ($dataValid, $dataPT) {
            $dataUser = User::create([
                'name' => $dataValid['nm_driver'],
                'email' => $dataValid['email'],
                'password' => Hash::make($dataValid['password']),
                'role' => 'driver',
            ]);

            TbDriver::create([
                'id_user' => $dataUser->id,
                'id_pt' => $dataPT->id_pt,
                'nm_driver' => $dataValid['nm_driver'],
                'nik' => $dataValid['nik'],
                'telp' => $dataValid['telp'],
                'alamat' => $dataValid['alamat'],
                'no_sim' => $dataValid['no_sim'],
                'status' => 'aktif',
            ]);
        });

        return redirect()
            ->route('pt.driver.index')
            ->with('success', 'Data driver berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir edit driver.
     */
    public function TampilFormEditDriverFunction(TbDriver $driver)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanDriverFunction($driver, $dataPT);

        $driver->load('user');

        return view('pt.driver.edit', compact(
            'dataPT',
            'driver'
        ));
    }

    /**
     * Memperbarui data driver dan akun pengguna.
     */
    public function UpdateDriverFunction(
        Request $request,
        TbDriver $driver
    ) {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanDriverFunction($driver, $dataPT);

        $driver->load('user');

        $dataValid = $request->validate([
            'nm_driver' => ['required', 'string', 'max:100'],
            'nik' => [
                'required',
                'string',
                'max:20',
                Rule::unique('tb_driver', 'nik')
                    ->ignore($driver->id_driver, 'id_driver'),
            ],
            'telp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'no_sim' => [
                'required',
                'string',
                'max:30',
                Rule::unique('tb_driver', 'no_sim')
                    ->ignore($driver->id_driver, 'id_driver'),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($driver->id_user, 'id'),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'status' => ['required', Rule::in(['aktif', 'nonaktif'])],
        ]);

        DB::transaction(function () use ($dataValid, $driver) {
            $driver->update([
                'nm_driver' => $dataValid['nm_driver'],
                'nik' => $dataValid['nik'],
                'telp' => $dataValid['telp'],
                'alamat' => $dataValid['alamat'],
                'no_sim' => $dataValid['no_sim'],
                'status' => $dataValid['status'],
            ]);

            $dataUser = [
                'name' => $dataValid['nm_driver'],
                'email' => $dataValid['email'],
            ];

            if (! empty($dataValid['password'])) {
                $dataUser['password'] = Hash::make(
                    $dataValid['password']
                );
            }

            $driver->user()->update($dataUser);
        });

        return redirect()
            ->route('pt.driver.index')
            ->with('success', 'Data driver berhasil diperbarui.');
    }

    /**
     * Menghapus driver beserta akun penggunanya.
     */
    public function HapusDriverFunction(TbDriver $driver)
    {
        $dataPT = $this->AmbilDataPtLoginFunction();

        $this->PeriksaKepemilikanDriverFunction($driver, $dataPT);

        DB::transaction(function () use ($driver) {
            $driver->user()->delete();
        });

        return redirect()
            ->route('pt.driver.index')
            ->with('success', 'Data driver berhasil dihapus.');
    }
}
