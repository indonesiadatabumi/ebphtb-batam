<!DOCTYPE html>
<html>
<head>
    <title>Bukti Transaksi SSPD EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

</head>
<body style="margin-left: 50px;" onload="{{ ($act === 'print' ? 'window.print()' : '') }}">
<div>
    <p style="text-align: center;">
        <u>BADAN PENDAPATAN DAERAH KOTA BATAM</u> <br />
        TANDA TERIMA TRANSAKSI BPHTB
    </p>
</div>
<div style="border-top: 1px solid;"></div>
<table border="0" width="100%" style="margin-top: 20px;">
  <tbody>
    <tr>
      <td width="25%">Kode Pesanan </td>
      <td>{{ $transaksi['kd_booking'] }}</td>
    </tr>
    <tr>
      <td>NOP </td>
      <td>{{ $transaksi['nop'] }}</td>
    </tr>
    <tr>
      <td>Alamat OP </td>
      <td>{{ $transaksi['alamat_op'] }}</td>
    </tr>
    <tr>
      <td>Nama Pembeli </td>
      <td>{{ $transaksi['nm_pembeli'] }}</td>
    </tr>
    <tr>
      <td>NIK Pembeli </td>
      <td>{{ $transaksi['no_identitas_pembeli'] }}</td>
    </tr>
    <tr>
      <td>Alamat Pembeli </td>
      <td>{{ $transaksi['alamat_pembeli'] }}</td>
    </tr>
    <tr>
      <td>BPHTB Terutang </td>
      <td>Rp {{ number_format($transaksi['bphtb_yg_harus_dibayar'], 0, ',','.') }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="font-style: italic;">({{ terbilang($transaksi['bphtb_yg_harus_dibayar']) }} rupiah)</td>
    </tr>
  </tbody>
</table>

<div style="margin-top: 30px;">
    <table width="100%" border="0">
        <tr  style="text-align: center;">
            <td width="50%">Wajib Pajak/ Penyetor</td>
            <td width="50%">Bank/ Penerima Setoran</td>
        </tr>
        <tr><td colspan="2" style="height: 30px;">&nbsp;</td></tr>
        <tr style="text-align: center;">
            <td>(tanda tangan dan nama jelas)</td>
            <td>(tanda tangan, nama jelas dan stempel)</td>
        </tr>
    </table>
</div>
<!-- End Table -->

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

</body>
</html>