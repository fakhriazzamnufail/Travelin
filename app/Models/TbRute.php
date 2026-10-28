<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TbRute extends Model
{
    protected $table = 'tb_rute';

    protected $primaryKey = 'id_rute';

    protected $fillable = [
        'id_pt',
        'kota_asal',
        'kota_tujuan',
        'harga',
        'estimasi_menit',
        'status',
    ];

    /**
     * Relasi rute dengan perusahaan travel.
     */
    public function pt(): BelongsTo
    {
        return $this->belongsTo(TbPt::class, 'id_pt', 'id_pt');
    }
}
