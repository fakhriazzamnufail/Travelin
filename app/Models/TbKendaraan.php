<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbKendaraan extends Model
{
    use HasFactory;

    protected $table = 'tb_kendaraan';

    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'id_pt',
        'no_polisi',
        'merk',
        'tipe',
        'warna',
        'kapasitas',
        'tahun',
        'status',
    ];

    /**
     * Relasi kendaraan dengan PT Travel.
     */
    public function pt()
    {
        return $this->belongsTo(TbPt::class, 'id_pt', 'id_pt');
    }

    public function jadwal()
    {
        return $this->hasMany(
            TbJadwal::class,
            'id_kendaraan',
            'id_kendaraan'
        );
    }
}