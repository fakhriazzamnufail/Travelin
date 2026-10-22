<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TbDriver extends Model
{
    protected $table = 'tb_driver';

    protected $primaryKey = 'id_driver';

    protected $fillable = [
        'id_user',
        'id_pt',
        'nm_driver',
        'nik',
        'telp',
        'alamat',
        'no_sim',
        'status',
    ];

    /**
     * Relasi driver dengan akun pengguna.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Relasi driver dengan perusahaan travel.
     */
    public function pt(): BelongsTo
    {
        return $this->belongsTo(TbPt::class, 'id_pt', 'id_pt');
    }
}
