<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataTransaksi;
use App\Models\KurangBayar;

class MonitoringTransaksiController extends Controller
{
    public function index()
    {
        $title = "Monitoring Transaksi";
        $tahun = \DB::table('tbl_tahun')->select('tahun')->where('status', 1)->orderBy('sorting', 'asc')->get();
        $data = DataTransaksi::select('tbl_data_transaksi.id', 'tbl_data_transaksi.nop', 'KD_BOOKING', \DB::raw('EXTRACT(YEAR FROM tbl_data_transaksi.tgl_rekam) AS rekam_year'), \DB::raw('EXTRACT(MONTH FROM tbl_data_transaksi.tgl_rekam) AS rekam_month'), 
        \DB::raw("TO_CHAR(tbl_data_transaksi.tgl_rekam, 'DD-MM-YYYY') AS tgl_rekam"),
        'STATUS_BAYAR', 'HARGA_TRANSAKSI', 'BPHTB_YG_HARUS_DIBAYAR', 'STATUS_VALIDASI', 'VALIDASI_KASI', 'VALIDASI_KABID', 'pb.nm_pembeli', 'pj.nm_penjual')
                ->leftJoin('tbl_pembeli as pb', 'pb.kd_bphtb','=','tbl_data_transaksi.kd_bphtb')
                ->leftJoin('tbl_penjual as pj', 'pj.kd_bphtb','=','tbl_data_transaksi.kd_bphtb')        
                ->where([
                    ['is_active', 1],
                    ['tbl_data_transaksi.reg_ppat', auth()->user()->id_register]
                ])
                ->orderBy('tbl_data_transaksi.tgl_rekam', 'DESC')
                ->get();

        return view('pages.monitoring_transaksi', compact('title', 'tahun', 'data'));
    }

    public function monitoringkb()
    {
        $title = "Monitoring Kurang Bayar";
        $tahun = \DB::table('tbl_tahun')->select('tahun')->where('status', 1)->orderBy('sorting', 'asc')->get();
        $data = KurangBayar::select('tbl_kurang_bayar.nop', 'tbl_kurang_bayar.kd_booking', 'no_ketetapan_kb', 'tgl_jatuh_tempo', 'nm_pembeli', 'jumlah_kb', 'alasan_kb', 
                \DB::raw("TO_CHAR(tbl_kurang_bayar.tgl_rekam_kb, 'DD-MM-YYYY') AS tgl_rekam_kb"), \DB::raw("TO_CHAR(tbl_kurang_bayar.tgl_ketetapan_kb, 'DD-MM-YYYY') AS tgl_ketetapan_kb"),
                \DB::raw('EXTRACT(YEAR FROM tbl_kurang_bayar.tgl_rekam_kb) AS rekam_year'), \DB::raw('EXTRACT(MONTH FROM tbl_kurang_bayar.tgl_rekam_kb) AS rekam_month'))
                // ->addSelect(\DB::raw('(select tgl_validasi from tbl_validasi_kb where kd_billing = tbl_kurang_bayar.kd_booking and validasi_ke=1) as tgl_validasi_ke1'))
                ->selectRaw(\DB::raw("(select TO_CHAR(tgl_validasi, 'DD-MM-YYYY') from tbl_validasi_kb where kd_billing = tbl_kurang_bayar.kd_booking and validasi_ke=1) as tgl_validasi_ke1"))
                ->selectSub(function ($query){
                    $query->from('tbl_validasi_kb')->select(\DB::raw("TO_CHAR(tgl_validasi, 'DD-MM-YYYY')"))->whereColumn([
                        ['validasi_ke', 2],
                        ['kd_billing', 'tbl_kurang_bayar.kd_booking']
                    ]);
                }, 'tgl_validasi_ke2')
                ->selectRaw(\DB::raw("(select TO_CHAR(tgl_validasi, 'DD-MM-YYYY') from tbl_validasi_kb where kd_billing = tbl_kurang_bayar.kd_booking and validasi_ke=3) as tgl_validasi_ke3"))
                ->leftJoin('tbl_data_transaksi as dt', 'dt.kd_booking', '=', 'tbl_kurang_bayar.kd_booking')
                ->where([
                    ['tbl_kurang_bayar.is_active', 1],
                    ['dt.reg_ppat', auth()->user()->id_register]
                ])
                ->orderBy('tbl_kurang_bayar.tgl_rekam_kb', 'DESC')
                ->get();

        return view('pages.monitoring_kb', compact('title', 'tahun', 'data'));
    }

    public function cetakKB($kd_billing)
    {
        return view('pages.cetak_kurang_bayar');
    }
}
