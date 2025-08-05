<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NjopController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $title = "Cek NJOP";

        return view('pages.ceknjop', compact('title'));
    }

    public function getnjop(Request $req)
    {
        $strnop = $req->nop;
        $nop = explode('.', $strnop);

        $dat_op = \DB::table("pbb.dat_objek_pajak")->select('total_luas_bumi', 'total_luas_bng', 'njop_bumi', 'njop_bng', 'subjek_pajak_id')
        ->where([
            ['kd_propinsi', $nop[0]],
            ['kd_dati2', $nop[1]],
            ['kd_kecamatan', $nop[2]],
            ['kd_kelurahan', $nop[3]],
            ['kd_blok', $nop[4]],
            ['no_urut', $nop[5]],
            ['kd_jns_op', $nop[6]]
        ])
        ->first();

        $subjekpajakid = trim($dat_op->subjek_pajak_id);
        $nm = \DB::table('pbb.dat_subjek_pajak')->select('nm_wp')->where('subjek_pajak_id', '1210220029196')->first();

        return $dat_op;
    }
}
