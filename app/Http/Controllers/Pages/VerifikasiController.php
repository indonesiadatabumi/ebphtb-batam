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
        // Contoh logika: Ambil semua transaksi yang statusnya menunggu verifikasi
        $dataTransaksi = DataTransaksi::where('status_pembayaran', 'menunggu_verifikasi')->get(); // Sesuaikan query

        return view('pages.verifikasi.transaksi', compact('dataTransaksi'));
    }

    /**
     * Menampilkan halaman verifikasi kurang bayar.
     */
    public function kurangBayar()
    {
        // Contoh logika: Ambil data kurang bayar yang perlu diverifikasi
        $dataKurangBayar = KurangBayar::where('status', 'menunggu_verifikasi')->get(); // Sesuaikan query

        return view('pages.verifikasi.kurang-bayar', compact('dataKurangBayar'));
    }
}