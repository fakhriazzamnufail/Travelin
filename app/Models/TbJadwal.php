<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TbJadwal extends Model
{
    protected $table = 'tb_jadwal';

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_pt',
        'id_rute',
        'id_kendaraan',
        'id_driver',
        'tanggal_berangkat',
        'jam_berangkat',
        'harga',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_berangkat' => 'date',
            'harga' => 'decimal:2',
        ];
    }

    /**
     * Relasi jadwal dengan perusahaan travel.
     */
    public function pt(): BelongsTo
    {
        return $this->belongsTo(
            TbPt::class,
            'id_pt',
            'id_pt'
        );
    }

    /**
     * Relasi jadwal dengan rute.
     */
    public function rute(): BelongsTo
    {
        return $this->belongsTo(
            TbRute::class,
            'id_rute',
            'id_rute'
        );
    }

    /**
     * Relasi jadwal dengan kendaraan.
     */
    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(
            TbKendaraan::class,
            'id_kendaraan',
            'id_kendaraan'
        );
    }

    /**
     * Relasi jadwal dengan driver.
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(
            TbDriver::class,
            'id_driver',
            'id_driver'
        );
    }
}
