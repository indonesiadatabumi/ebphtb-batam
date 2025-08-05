<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\AuthController;
use App\Http\Controllers\Pages\SspdController;
use App\Http\Controllers\Pages\TransactionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Pages\DashboardController;
use App\Http\Controllers\NjopController;
use App\Http\Controllers\Pages\MonitoringTransaksiController;

// Route::get('/', function () { 
//     return view('pages/login');   
// });
 

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::resource('sspd', SspdController::class);

    Route::get('/konfirmsspd', [SspdController::class, 'konfirmasiSSPD'])->name('konfirmsspd');
    Route::get('/bukti-transaksi/{act}/{bookid}', [SspdController::class, 'buktiTransaksi']);
    Route::get('/print-sspd/{bookid}', [SspdController::class, 'printSSPD']);
    Route::post('/sspd/ceknop', [SspdController::class, 'cekNOP'])->name('CekNOP');
    Route::post('/sspd/cekpbb', [SspdController::class, 'cekPBB'])->name('CekPBB');    
    Route::post('/sspd/cektunggakanpbb', [SspdController::class, 'cekTunggakanPBB'])->name('cekTunggakanPBB');
    Route::get('/sspd/lampiran/{bookid}/{id}', [SspdController::class, 'lampiranView']);
    Route::post('/sspd/hapusbilling', [SspdController::class, 'hapusSSPD'])->name('sspd:hapusbilling');
    Route::post('/sspd/transaksi-nik', [SspdController::class, 'cekTransaksiNIK'])->name('transaksiNIK');
    Route::get('/sspd/create/{bookid}', [SspdController::class, 'CreateKB']);

    // Cek NJOP
    Route::get('/njop', [NjopController::class, 'index'])->name('cekNJOP');
    Route::post('/njop', [NjopController::class, 'getnjop'])->name('getnjop');
    
    // Monitoring Transaksi 
    Route::get('/monitoring/transaksi', [MonitoringTransaksiController::class, 'index']);
    Route::get('/monitoring/kb', [MonitoringTransaksiController::class, 'monitoringkb']);
    Route::get('/kb/cetak/{bookid}', [MonitoringTransaksiController::class, 'cetakKB']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/transaction', [TransactionController::class, 'transaction'])->name('transaction');
});

// Route::get('/print-sspd/{bookid}', [SspdController::class, 'printSSPD']);

Route::get('/', [AuthController::class, 'login'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginStore'])->name('Login:Store');
// Route::get('/login/otp', [AuthController::class, 'formOtp'])->name('login:otp');
Route::post('/login/verify-otp', [AuthController::class, 'verifyOTP'])->name('Login:verifyOTP');
Route::post('/login/cek-otp', [AuthController::class, 'cekOTP'])->name('Login:cekOTP');
Route::post('/login/update/usertest', [AuthController::class, 'updateUserTest'])->name('login:update:usertest');

Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

// Route::get('/login/tesotp', [AuthController::class, 'tesOTP']);

// });
