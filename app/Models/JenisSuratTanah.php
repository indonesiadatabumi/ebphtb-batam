<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSuratTanah extends Model
{
    protected $table = 'jenis_surat_tanah';

    protected $primaryKey = 'kd_hak';

    protected $fillable = [
        'kd_hak',
        'nm_hak',
        'is_active',
    ];
}
