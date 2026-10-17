<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\TbPt;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan ketika data user diserialisasi.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Pengaturan tipe data beberapa atribut.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi User dengan data PT Travel.
     *
     * Satu akun user dengan role PT
     * memiliki satu data perusahaan di tb_pt.
     */
    public function pt()
    {
        return $this->hasOne(
            TbPt::class,
            'id_user',
            'id'
        );
    }
}