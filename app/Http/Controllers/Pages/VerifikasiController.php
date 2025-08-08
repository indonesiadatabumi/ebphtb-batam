<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataTransaksi;
use App\Models\KurangBayar;

class VerifikasiController extends Controller
{
    /**
     * Menampilkan halaman verifikasi transaksi.
     */
     public function transaksi()
    {
        $title = "Verfikasi Transaksi";
        $tahun = \DB::table('tbl_tahun')
                ->select('tahun')
                ->where('status', 1)
                ->orderBy('sorting', 'asc')
                ->get();

        $dataTransaksi = DataTransaksi::select(
                'tbl_data_transaksi.ID', 
                'tbl_data_transaksi.NOP', 
                'tbl_data_transaksi.KD_BPHTB',
                'tbl_data_transaksi.KD_BOOKING',
                'tbl_data_transaksi.KETERANGAN',
                'tbl_data_transaksi.LUAS_TANAH',
                'tbl_data_transaksi.LUAS_BNG',
                \DB::raw("TO_CHAR(tbl_data_transaksi.TGL_REKAM, 'DD-MM-YYYY') AS TGL_REKAM"),
                'tbl_data_transaksi.STATUS_BAYAR', 
                'tbl_data_transaksi.HARGA_TRANSAKSI', 
                'tbl_data_transaksi.BPHTB_YG_HARUS_DIBAYAR', 
                'tbl_data_transaksi.STATUS_VALIDASI',
                'tbl_data_transaksi.VALIDASI_KASI', 
                'tbl_data_transaksi.VALIDASI_KABID', 
                'pb.NM_PEMBELI'
            )
            ->leftJoin('tbl_pembeli as pb', 'pb.KD_BPHTB', '=', 'tbl_data_transaksi.KD_BPHTB')

            ->where([
                ['tbl_data_transaksi.is_active', 1],
                ['tbl_data_transaksi.reg_ppat', auth()->user()->id_register]
            ])
            ->orderBy('tbl_data_transaksi.TGL_REKAM', 'DESC')
            ->get();

        // Mengirim semua data ke view
        return view('pages.verifikasi', compact('title', 'tahun', 'dataTransaksi'));
    }

    /**
     * Menampilkan halaman verifikasi kurang bayar.
     */
    public function kurangBayar()
    {
        // Contoh logika: Ambil data kurang bayar yang perlu diverifikasi
        $dataKurangBayar = KurangBayar::where('status', 'menunggu_verifikasi')->get(); // Sesuaikan query

        return view('pages.verifikasi_kurang_bayar', compact('dataKurangBayar'));
    }
}