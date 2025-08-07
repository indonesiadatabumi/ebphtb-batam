<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTransaksi; // Sesuaikan jika nama model berbeda
use App\Models\KurangBayar;    // Sesuaikan jika nama model berbeda

class VerifikasiController extends Controller
{
    /**
     * Menampilkan halaman verifikasi transaksi.
     */
    public function transaksi()
    {
        $title = "Verifikasi Transaksi";
        $tahun = \DB::table('tbl_tahun')->select('tahun')->where('status', 1)->orderBy('sorting', 'asc')->get();
        return view('pages.verifikasi', compact('title', 'tahun'));
    }

    /**
     * Menampilkan halaman verifikasi kurang bayar.
     */
    public function kurangBayar()
    {
        // Contoh logika: Ambil data kurang bayar yang perlu diverifikasi
        // $dataKurangBayar = KurangBayar::where('status', 'menunggu_verifikasi')->get(); // Sesuaikan query

        return view('pages.verifikasi_kurang_bayar', );
    }
}