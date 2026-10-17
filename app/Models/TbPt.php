<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\TbKendaraan;

class TbPt extends Model
{
    use HasFactory;

    protected $table = 'tb_pt';

    protected $primaryKey = 'id_pt';

    protected $fillable = [
        'id_user',
        'nm_pt',
        'telp',
        'alamat',
        'status',
    ];

    /**
     * Relasi ke user pemilik PT
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Relasi PT Travel dengan kendaraan.
     */
    public function kendaraan()
    {
        return $this->hasMany(TbKendaraan::class, 'id_pt', 'id_pt');
    }
}