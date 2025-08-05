<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunModel extends Model
{
    protected $table = 'tbl_tahun';

    protected $fillable = [
        'tahun',
        'created',
        'sorting',
        'status'
    ];
}
