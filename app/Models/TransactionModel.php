<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionModel extends Model
{
    // Kalau mau kolom bisa diisi massal
    // protected $fillable = [...];

    public static function getByRegPpat()
    {
        return DB::select("
            SELECT * FROM (
                SELECT *
                FROM tbl_data_transaksi a
                LEFT JOIN tbl_penjual b ON a.kd_bphtb = b.kd_bphtb
                LEFT JOIN tbl_pembeli c ON a.kd_bphtb = c.kd_bphtb
                LEFT JOIN tbl_booking d ON a.kd_booking = d.kd_booking
                WHERE EXTRACT(MONTH FROM a.tgl_rekam) = ?
                AND EXTRACT(YEAR FROM a.tgl_rekam) = ?
                ORDER BY a.tgl_rekam
            ) WHERE ROWNUM <= 100
        ", [4, 2025]);
    }
}
