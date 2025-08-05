<!DOCTYPE html>
<html>
<head>
    <title>SSPD | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .text10 {
            font-size: 10px;
        }
        .text11 {
            font-size: 11px;
        }
        .text12 {
            font-size: 12px;
        }
        .text13 {
            font-size: 13px;
        }
        .text14 {
            font-size: 14px;
        }

    </style>
</head>
<body style="margin: 10px 10px 10px 20px;" onload="window.print()">
<div class="card">
    <table border="1" width="100%" cellpadding="2" cellspacing="0">
        <tr>
            <td rowspan="2" width="10%" align="center"><img src="{{ asset('assets/img/logo_batam_bw.jpg') }}" alt="Image Description" width="90"></td>
            <td style="font-size: 14px; font-weight: bold; text-align: center;">
                <div>SURAT SETORAN PAJAK DAERAH</div>
                <div>BEA PEROLEHAN HAK ATAS TANAH DAN BANGUNAN</div>
                <div>(SSPD - BPHTB)</div>
            </td>
            <td rowspan="2" style="text-align: center;" width="15%">Lembar 1<br /> Untuk Wajib Pajak</td>
        </tr>
        <tr>
            <td style="font-size: 12px; text-align: center;">
                <div>BERFUNGSI SEBAGAI ALAT PEMBERITAHUAN OBJEK PAJAK</div>
                <div>PAJAK BUMI DAN BANGUNAN (SPOP/LSPOP PBB)</div>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 12px;">BADAN PENDAPATAN DAERAH KOTA BATAM</td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 12px;">PERHATIAN : Periksa kembali dengan teliti SSPD Elektronik ini</td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="row ml-2">
                    <label class="col-sm-2 col-form-label text14">Nama Wajib Pajak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->nm_pembeli }}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-2 col-form-label text14">NIK</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->no_identitas_pembeli}}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-2 col-form-label text14">NPWP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->npwp_pembeli }}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-2 col-form-label text14">Alamat Wajib Pajak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->alamat_pembeli }} Blok/Kav/No. {{ $trans->blok_kav_no_pembeli }} RT/RW {{ $trans->rt_pembeli }}/{{ $trans->rw_pembeli }} {{ $trans->kelurahan_pembeli }} {{ $trans->kecamatan_pembeli }}" readonly>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="row ml-2">
                    <label class="col-sm-3 col-form-label text14">Nomor Objek Pajak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->nop }}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-3 col-form-label text14">Letak Tanah dan Bangunan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->alamat_op }}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-3 col-form-label text14">Kelurahan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->nm_kelurahan }}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-3 col-form-label text14">Kecamatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="{{ $trans->nm_kecamatan }}" readonly>
                    </div>
                </div>
                <div class="row ml-2">
                    <label class="col-sm-3 col-form-label text14">Kabupaten/ Kota</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext text14" value="Batam" readonly>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="text14 font-weight-bold">Penghitungan NJOP PBB</div>
                <table border="1" cellpadding="2" cellspacing="0" width="100%">
                    <tr style="font-size: 12px; text-align: center;">
                        <td>Uraian</td>
                        <td>Luas <br/>(isi luas tanah dan atau bangunan yang haknya diperoleh)</td>
                        <td>NJOP PBB/ m<sup>2</sup> <br/>(isi berdasarkan SPPT PBB tahun terjadinya perolehan hak/ tahun)</td>
                        <td>Luas x NJOP PBB/ m<sup>2</sup></td>
                    </tr>
                    <tr class="text12">
                        <td>Tanah (bumi)</td>
                        <td>{{ $trans->luas_tanah }}</td>
                        <td>Rp {{ Number::format($trans->njop_bumi, locale: 'de') }}</td>
                        <td class="text-right">Rp {{ Number::format($trans->luas_tanah * $trans->njop_bumi, locale: 'de') }}</td>
                    </tr>
                    <tr class="text12">
                        <td>Bangunan</td>
                        <td>{{ $trans->luas_bng }}</td>
                        <td>Rp {{ Number::format($trans->njop_bng, locale: 'de') }}</td>
                        <td class="text-right">Rp {{ Number::format($trans->luas_bng * $trans->njop_bng, locale: 'de') }}</td>
                    </tr>
                    <tr class="text12">
                        <td colspan="3" style="text-align: center;">NJOP PBB</td>
                        <td class="text-right">Rp {{ Number::format($trans->njop_total, locale: 'de') }}</td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="text12">Harga Transaksi/ Nilai Pasar: Rp {{ Number::format($trans->harga_transaksi, locale: 'de') }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="text12">Jenis Perolehan atas Tanah dan atau Bangunan: {{ $trans->nm_perolehan }} ({{ $trans->jns_perolehan }})</div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="text12">Nomor Sertifikat: {{ $trans->no_sertifikat }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text14">
                C. Penghitungan BPHTB (hanya diisi berdasarkan penghitungan wajib pajak)
            </td>
        </tr>
        <tr class="text12">
            <td colspan="3" style="padding-left: 20px;">
                <form>
                <div class="form-row">
                    <div class="col-7">
                    1. Nilai Perolehan Objek Pajak (NPOP) memperhatikan nilai pada B.13 dan B.14
                    </div>
                    <div class="col">
                    &nbsp;
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-sm text12 text-right" value="Rp {{ Number::format($trans->npop, locale: 'de') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7">
                    2. Nilai Perolehan Objek Pajak Tidak Kena Pajak(NPOPTKP)
                    </div>
                    <div class="col">
                    &nbsp;
                    </div>
                    <div class="col">
                    <input type="text" class="form-control form-control-sm text12  text-right" value="Rp {{ Number::format($trans->npoptkp, locale: 'de') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7">
                    3. Nilai Perolehan Objek Pajak Kena Pajak(NPOPKP)
                    </div>
                    <div class="col">
                    angka 1 - angka 2
                    </div>
                    <div class="col">
                    <input type="text" class="form-control form-control-sm text12 text-right" value="Rp {{ Number::format($trans->npopkp, locale: 'de') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7">
                    4. Bea perolehan Hak Atas Tanah Dan Bangunan yang Terutang
                    </div>
                    <div class="col">
                    5% x angka 3
                    </div>
                    <div class="col">
                    <input type="text" class="form-control form-control-sm text12 text-right" value="Rp {{ Number::format($trans->bphtb_terutang, locale: 'de') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7">
                    5. Pengenaan {{ $trans->peng_waris_hibah_wasiat }}% karena {{ $trans->nm_perolehan }}
                    </div>
                    <div class="col">
                    0% x angka 4
                    </div>
                    <div class="col">
                    <input type="text" class="form-control form-control-sm text12 text-right" value="Rp {{  Number::format($trans->peng_waris_hibah_wasiat * $trans->bphtb_terutang, locale: 'de') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7">
                    6. Bea Perolehan Hak Atas Tanah dan atau Bangunan yang harus di Bayar
                    </div>
                    <div class="col">
                    &nbsp;
                    </div>
                    <div class="col">
                    <input type="text" class="form-control form-control-sm text12 text-right" value="Rp {{ Number::format($trans->bphtb_yg_harus_dibayar, locale: 'de') }}">
                    </div>
                </div>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text14">
                D. Jumlah Setoran Berdasarkan 
            </td>
        </tr>
        <tr class="text12">
            <td colspan="3">
                <div class="form-row">
                    <div class="col-7 text12">
                        <img src="{{ ($trans->jns_setoran == '1' ? asset('assets/img/check.gif') : asset('assets/img/uncheck.gif') ) }}">
                        a. Penghitung Wajib Pajak
                    </div>
                    <div class="col">&nbsp;</div>
                    <div class="col"></div>
                </div>
                <div class="form-row">
                    <div class="col-4 text12">
                        <img src="{{ ($trans->jns_setoran == '2' ? asset('assets/img/check.gif') : asset('assets/img/uncheck.gif') ) }}">
                        b. STPD BPHTB/ SKPDB kurang bayar/ <br />SKPDB kurang bayar tambahan
                    </div>
                    <div class="col-5">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm text12 text-right">Nomor:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm text12" value="{{ ($trans->jns_setoran == '2' ? $trans->no_stb_skbkb : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm text12 text-right">Tgl: </label>
                            <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm text12" value="{{ ($trans->jns_setoran == '2' ? $trans->tgl_stb_skbkb : '') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                   <div class="col-6 text12">
                        <img src="{{ asset('assets/img/uncheck.gif') }}">
                        c. Pengurangan dihitung sendiri menjadi: ...... % berdasarkan peraturan KDH
                    </div>
                    <div class="col">
                        <!-- <div class="form-group row">
                            <div class="col-sm-2 text12">
                                Nomor: 
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm text10">
                            </div>
                        </div> -->
<form class="form-inline">
  <div class="form-group">
    <label for="inputPassword6">Nomor:</label>
    <input type="password" id="inputPassword6" class="form-control form-control-sm mx-sm-3 text12" aria-describedby="passwordHelpInline">
  </div>
</form>
                    </div>
         
                </div>
                <div class="form-row">
                    <div class="col-7 text12">
                        <img src="{{ asset('assets/img/uncheck.gif') }}">
                        d. .........................................
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text12">
                <div class="row">
                    <div class="col">
                        Jumlah yang disetor (dengan angka) 
                        <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm text12" value="Rp {{ Number::format($trans->bphtb_yg_harus_dibayar, locale: 'de') }}">
                        </div>
                        (berdasarkan perhitungan C4 dan pilihan di D)
                    </div>
                    <div class="col">
                        (dengan huruf) <br />
                        {{ penyebut($trans->bphtb_yg_harus_dibayar) }} {{ ($trans->bphtb_yg_harus_dibayar == 0 ? 'nihil' : 'rupiah') }}
                    </div>
                </div>
            </td>
        </tr>
        <tr class="text12">
            <td colspan="3" style="text-align: center;">
                <div class="row">
                    <div class="col">
                        <div>
                        Batam, {{ date('d M Y')}} <br />
                        Wajib Pajak/ Penyetor
                        </div>
                        <div style="height: 66px;">&nbsp;</div>
                        <div>nama lengkap dan tandatangan</div>
                    </div>
                    <div class="col">
                        <div>
                        Mengetahui, <br />
                        PPAT/ Notaris
                        </div>
                        <div style="height: 66px;">&nbsp;</div>
                        <div>nama lengkap dan tandatangan</div>
                    </div>
                    <div class="col">
                        <div>
                        Diterima Oleh, <br />
                        Tempat Pembayaran BPHTB <br />
                        tanggal ...........
                        </div>
                        <div style="height: 48px;">&nbsp;</div>
                        <div>nama lengkap dan tandatangan</div>
                    </div>
                    <div class="col">
                        <div>
                        Telah diverifikasi, <br />
                        a.n. Kepala Badan Pendapatan Daerah <br />
                        Kota Batam <br />
                        Kepala Bidang Pajak Daerah I
                        </div>
                        <div style="height: 30px;">&nbsp;</div>
                        <div>nama lengkap dan tandatangan</div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="row">
                    <div class="col-3 text13">
                        <div>
                            Hanya diisi oleh petugas bapenda
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm text13">No. Dokumen</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm text12" id="colFormLabelSm" placeholder="No. Dokumen">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm text13">NOP PBB Baru</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm text12" id="colFormLabelSm" placeholder="No. PBB baru">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <img src="{{ url('qrcode/qr-code.png') }}" width="80">
                    </div>
                </div>
                <div>
                    <small id="passwordHelpBlock" class="form-text text-muted font-italic">
                    217100900301102760|7250767412|2025123456789|NTS2017042800392
                    </small>
                </div>
            </td>
        </tr>
    </table>
</div>
<br />


@php
    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";

		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai < 20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
    }

    function terbilang($nilai) {
		if($nilai < 0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
@endphp


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>