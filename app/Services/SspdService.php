<?php

namespace App\Services;

use App\Models\DataTransaksi;
use App\Models\Pembeli;
use App\Models\Penjual;
use File;

class SspdService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public static function createSSPD($request)
    {
        $tahun = $request->tahun;
        $jns_perolehan = $request->jns_perolehan;
        $nop = str_replace('.','',$request->nop);
        $alamat = $request->alamat;
        $blok_kav = $request->blok_kav;
        $rt = $request->rt;
        $rw = $request->rw;
        $kelurahan = $request->kelurahan;
        $kecamatan = $request->kecamatan;
        $kota = $request->kota;
        $kodepos = $request->kodepos;
        $no_sertifikat = $request->no_sertifikat;
        $luastanah = $request->luastanah;
        $njoptanah = str_replace('.','',$request->njoptanah);
        $luasbng = $request->luasbng;
        $njopbng = str_replace('.','',$request->njopbng);
        $njoptotal = str_replace('.','',$request->njoptotal);
        $harga = str_replace('.','',$request->hargatransaksi);
        $npop = str_replace('.','',$request->npop);
        $npoptkp = str_replace('.','',$request->npoptkp);
        $npopkp = str_replace('.','',$request->npopkp);
        $bphtb = str_replace('.','',$request->bphtb);
        $diskon = $request->pengurangan;
        $bphtb_dibayar = str_replace('.','',$request->bphtb_dibayar);
        $jns_setoran = $request->jns_setoran;
        $dokPendukung = $request->dokPendukung;
        $tgl_dokPendukung = $request->tgl_dokPendukung;
        $status_bgn = $request->status_bgn;
        $legal = $request->legalitas_hak;
        $multipleNOP = $request->checkMultipleNOP;
        $ket = $request->keterangan;

        $prop = substr($nop,0, 2);
        $kd_dati2 = substr($nop,2, 2);
        $kd_kecamatan = substr($nop,4, 3);
        $kd_kelurahan = substr($nop,7, 3);
        $kd_blok = substr($nop,10, 3);
        $no_urut = substr($nop,13, 4);
        $jns_op = substr($nop,17, 1);

        $bookId = self::kd_booking();
        $kd_bphtb = date('dmy').$bookId;

        // step 1 insert objek pajak
        $transaksi = DataTransaksi::create([
            'id'=> self::idTransaksi(),
            'nop' => $nop,
            'kd_bphtb' => $kd_bphtb,
            'kd_booking' => $bookId,
            'reg_ppat' => auth()->user()->id_register,
            'nop_induk' => '0',
            'alamat_op' => $alamat,
            'blok_kav_no_op' => $blok_kav,
            'rt_op' => $rt,
            'rw_op' => $rw,
            'kota_op' => '71',
            'kecamatan' => $kd_kecamatan,
            'kelurahan' => $kd_kelurahan,
            'kodepos' => $kodepos,
            'jns_perolehan' => $jns_perolehan,
            'luas_tanah' => $luastanah,
            'luas_bng' => $luasbng,
            'njop_bumi' => $njoptanah,
            'njop_bng' => $njopbng,
            'njop_total' => $njoptotal,
            'harga_transaksi' => $harga,
            'npop' => $npop,
            'npoptkp' => $npoptkp,
            'npopkp' => $npopkp,
            'bphtb_terutang' => $bphtb,
            'peng_waris_hibah_wasiat' => $diskon,
            'bphtb_yg_harus_dibayar' => $bphtb_dibayar,
            'jns_setoran' => $jns_setoran,
            'tgl_rekam' => date('Y-m-d H:i:s'),
            'status_booking' => 1,
            'kd_hak' => $legal,
            'no_sertifikat' => $no_sertifikat,
            'no_stb_skbkb' => (isset($request->nomorKB) ? $request->nomorKB : null),
            'tgl_stb_skbkb' => (isset($request->tanggalKB) ? $request->tanggalKB : null),
            'keterangan' => $ket,
            'no_surat_kematian' => null,
            'no_dok_pendukung' => $dokPendukung,
            'tgl_dok_pendukung' => $tgl_dokPendukung,
            'transaksi_multinop' => $multipleNOP,
            'tahun' => $tahun,
            'sts_sknjop' => null,
            'no_sknjop' => null,
            'ptsl' => null,
            'status_bgn' => $status_bgn,
            'jenis_waris' => null,
            'program_pajak' =>null,
            'status_bayar' => 0
        ]);
        
        if($transaksi){
            // insert tabel booking
            \DB::table('TBL_BOOKING')->insert([
                'ID' => \DB::table('TBL_BOOKING')->max('id') + 1,
                'NOP' => $nop,
                'REG_PPAT' => auth()->user()->id_register,
                'KD_BOOKING' => $bookId,
                'TGL_BOOKING' => date('Y-m-d H:i:s'),
                'EXPIRE_TIME' => date('Y-m-d H:i:s', strtotime('+2 week'))
            ]);

            $idTablePembeli = Pembeli::max('id') + 1;
            $jns_identitas = $request->jns_identitas;
            $nik_pembeli = $request->nik_pembeli;
            $nib_pembeli = $request->nib_pembeli;
            $nama_pembeli = $request->nama_pembeli;
            $jk_pembeli = $request->jk_pembeli;
            $tptlahir_pembeli = $request->tptlahir_pembeli;
            $tglLahirPembeli = (!empty($request->tglLahirPembeli) ? date("Y-m-d", strtotime($request->tglLahirPembeli)) : null);
            $sts_kawin_pembeli = $request->sts_kawin_pembeli;
            $pekerjaan_pembeli = $request->pekerjaan_pembeli;
            $alamat_pembeli = $request->alamat_pembeli;
            $blok_kav_pembeli = $request->blok_kav_pembeli;
            $rt_pembeli = $request->rt_pembeli;
            $rw_pembeli = $request->rw_pembeli;
            $kelurahan_pembeli = $request->kelurahan_pembeli;
            $kecamatan_pembeli = $request->kecamatan_pembeli;
            $kota_pembeli = $request->kota_pembeli;
            $kodepos_pembeli = $request->kodepos_pembeli;
            $hp_pembeli = $request->hp_pembeli;
            $email_pembeli = $request->email_pembeli;
            $npwp_pembeli = $request->npwp_pembeli;
            $ket_pembeli = $request->ket_pembeli;

            // step 2 insert data pembeli
            $pembeli = Pembeli::create([
                'id' => $idTablePembeli,
                'jns_identitas_pembeli' => $jns_identitas,
                'no_identitas_pembeli' => $nik_pembeli,
                'npwp_pembeli' => $npwp_pembeli,
                'kd_bphtb' => $kd_bphtb,
                'reg_ppat' => auth()->user()->id_register,
                'nm_pembeli' => $nama_pembeli,
                'jns_kel_pembeli' => $jk_pembeli,
                'tempat_lahir_pembeli' => $tptlahir_pembeli,
                'tgl_lahir_pembeli' => $tglLahirPembeli,
                'stat_kawin_pembeli' => $sts_kawin_pembeli,
                'jns_pekerjaan_pembeli' => $pekerjaan_pembeli,
                'alamat_pembeli' => $alamat_pembeli,
                'blok_kav_no_pembeli' => $blok_kav_pembeli,
                'rt_pembeli' => $rt_pembeli,
                'rw_pembeli' => $rw_pembeli,
                'kota_pembeli' => $kota_pembeli,
                'kodepos_pembeli' => $kodepos_pembeli,
                'kecamatan_pembeli' => $kecamatan_pembeli,
                'kelurahan_pembeli' => $kelurahan_pembeli,
                'hp_pembeli' => $hp_pembeli,
                'email_pembeli' => $email_pembeli,
                'keterangan_pembeli' => $ket_pembeli,
                'tgl_rekam' => date('Y-m-d H:i:s'),
                'nib_pembeli' => $nib_pembeli 
            ]);

            // insert data penjual
            $penjual = Penjual::create([
                'id' => Penjual::max('id') + 1,
                'jns_identitas_penjual' => $request->jns_identitas_pj,
                'no_identitas_penjual' => $request->nik_penjual,
                'npwp_penjual' => $request->npwp_penjual,
                'kd_bphtb' => $kd_bphtb,
                'reg_ppat' => auth()->user()->id_register,
                'nm_penjual' => $request->nama_penjual,
                'jns_kel_penjual' => $request->jk_penjual,
                'tempat_lahir_penjual' => $request->tptlahir_penjual,
                'tgl_lahir_penjual' => (!empty($request->tglLahirPenjual) ? date("Y-m-d", strtotime($request->tglLahirPenjual)) : null),
                'stat_kawin_penjual' => $request->sts_kawin_penjual,
                'jns_pekerjaan_penjual' => $request->pekerjaan_penjual,
                'alamat_penjual' => $alamat_pembeli,
                'blok_kav_no_penjual' => $request->blok_kav_penjual,
                'rt_penjual' => $request->rt_penjual,
                'rw_penjual' => $request->rw_penjual,
                'kota_penjual' => $request->kota_penjual,
                'kodepos_penjual' => $request->kodepos_penjual,
                'kecamatan_penjual' => $request->kecamatan_penjual,
                'kelurahan_penjual' => $request->kelurahan_penjual,
                'hp_penjual' => $request->hp_penjual,
                'email_penjual' => $request->email_penjual,
                'keterangan_penjual' => $request->ket_penjual,
                'tgl_rekam' => date('Y-m-d H:i:s'),
                'nib_penjual' => $request->nib_penjual
            ]);

            // step 4 upload file 
            $lampiranID = $request->lampiranID;

            for($i=0; $i < count($lampiranID); $i++){
                $files = \DB::table('M_LAMPIRAN_SSPD')->select('NAME')->where('ID', $lampiranID[$i])->first();
                $fileUplod = $files->name;

                if($request->hasFile($fileUplod)){
                    $fileName = $bookId.'_'.$lampiranID[$i].'_'.uniqid().'.'.$request->$fileUplod->extension();
                    $request->$fileUplod->move(public_path('uploads/transaksi'), $fileName);

                    \DB::table('TBL_LAMPIRAN_SSPD')->insert([
                        'ID' => \DB::table('TBL_LAMPIRAN_SSPD')->max('id') + 1,
                        'ID_MST_LAMPIRAN' => $lampiranID[$i],
                        'NAMAFILE' => $fileName,
                        'KD_BILLING' => $bookId,
                        'CREATED_AT' => date('Y-m-d H:i:s')
                    ]);
                }
            }

            return $bookId;
        }else {
            return 'false';
        }

    }

    static function kd_booking()
    {
        $digits = 5;
        $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        $tgl = date('dm'); // date and month

        $bookID = '7' . $tgl . $rand;
        return $bookID;
    }

    static function idTransaksi()
    {
        $id = DataTransaksi::max('id') + 1;
        return $id;
    }

    public static function updateSSPD($request, $id)
    {
        DataTransaksi::where('kd_booking', $id)->update([
            'nop' => str_replace('.','',$request->nop),
            'alamat_op' => $request->alamat,
            'blok_kav_no_op' => $request->blok_kav,
            'rt_op' => $request->rt,
            'rw_op' => $request->rw,
            'kota_op' => '71',
            'kecamatan' => $request->kd_kecamatan,
            'kelurahan' => $request->kd_kelurahan,
            'kodepos' => $request->kodepos,
            'jns_perolehan' => $request->jns_perolehan,
            'luas_tanah' => $request->luastanah,
            'luas_bng' => $request->luasbng,
            'njop_bumi' => str_replace('.','',$request->njoptanah),
            'njop_bng' => str_replace('.','',$request->njopbng),
            'njop_total' => str_replace('.','',$request->njoptotal),
            'harga_transaksi' => str_replace('.','',$request->hargatransaksi),
            'npop' => str_replace('.','',$request->npop),
            'npoptkp' => str_replace('.','',$request->npoptkp),
            'npopkp' => str_replace('.','',$request->npopkp),
            'bphtb_terutang' => str_replace('.','',$request->bphtb),
            'peng_waris_hibah_wasiat' => $request->pengurangan,
            'bphtb_yg_harus_dibayar' => str_replace('.','',$request->bphtb_dibayar),
            'jns_setoran' => $request->jns_setoran,
            'kd_hak' => $request->legalitas_hak,
            'no_sertifikat' => $request->no_sertifikat,
            'keterangan_op' => $request->keterangan,
            'no_surat_kematian' => null,
            'no_dok_pendukung' => $request->dokPendukung,
            'tgl_dok_pendukung' => $request->tgl_dokPendukung,
            'transaksi_multinop' => $request->checkMultipleNOP,
            'tahun' => $request->tahun,
            'sts_sknjop' => null,
            'no_sknjop' => null,
            'ptsl' => null,
            'status_bgn' => $request->status_bgn,
            'jenis_waris' => null,
            'program_pajak' =>null,
            'updated_at' => date('Y-m-d H:i:s'),
            'update_oleh' => auth()->user()->id
        ]);

        Pembeli::where('kd_bphtb', $request->kd_bphtb)->update([
                'jns_identitas_pembeli' => $request->jns_identitas,
                'no_identitas_pembeli' => $request->nik_pembeli,
                'npwp_pembeli' => $request->npwp_pembeli,
                'nm_pembeli' => $request->nama_pembeli,
                'jns_kel_pembeli' => $request->jk_pembeli,
                'tempat_lahir_pembeli' => $request->tptlahir_pembeli,
                'tgl_lahir_pembeli' => $request->tglLahirPembeli,
                'stat_kawin_pembeli' => $request->sts_kawin_pembeli,
                'jns_pekerjaan_pembeli' => $request->pekerjaan_pembeli,
                'alamat_pembeli' => $request->alamat_pembeli,
                'blok_kav_no_pembeli' => $request->blok_kav_pembeli,
                'rt_pembeli' => $request->rt_pembeli,
                'rw_pembeli' => $request->rw_pembeli,
                'kota_pembeli' => $request->kota_pembeli,
                'kodepos_pembeli' => $request->kodepos_pembeli,
                'kecamatan_pembeli' => $request->kecamatan_pembeli,
                'kelurahan_pembeli' => $request->kelurahan_pembeli,
                'hp_pembeli' => $request->hp_pembeli,
                'email_pembeli' => $request->email_pembeli,
                'keterangan_pembeli' => $request->ket_pembeli,
                'updated_at' => date('Y-m-d H:i:s'),
                'update_oleh' =>  auth()->user()->id,
                'nib_pembeli' => $request->nib_pembeli 
            ]);
        
        Penjual::where('kd_bphtb', $request->kd_bphtb)->update([
                'jns_identitas_penjual' => $request->jns_identitas_pj,
                'no_identitas_penjual' => $request->nik_penjual,
                'npwp_penjual' => $request->npwp_penjual,
                'nm_penjual' => $request->nama_penjual,
                'jns_kel_penjual' => $request->jk_penjual,
                'tempat_lahir_penjual' => $request->tptlahir_penjual,
                'tgl_lahir_penjual' => (!empty($request->tglLahirPenjual) ? date("Y-m-d", strtotime($request->tglLahirPenjual)) : null),
                'stat_kawin_penjual' => $request->sts_kawin_penjual,
                'jns_pekerjaan_penjual' => $request->pekerjaan_penjual,
                'alamat_penjual' => $request->alamat_penjual,
                'blok_kav_no_penjual' => $request->blok_kav_penjual,
                'rt_penjual' => $request->rt_penjual,
                'rw_penjual' => $request->rw_penjual,
                'kota_penjual' => $request->kota_penjual,
                'kodepos_penjual' => $request->kodepos_penjual,
                'kecamatan_penjual' => $request->kecamatan_penjual,
                'kelurahan_penjual' => $request->kelurahan_penjual,
                'hp_penjual' => $request->hp_penjual,
                'email_penjual' => $request->email_penjual,
                'keterangan_penjual' => $request->ket_penjual,
                'nib_penjual' => $request->nib_penjual
        ]);
        

        // step 4 upload file 
        $lampiranID = $request->lampiranID;

        for($i=0; $i < count($lampiranID); $i++){
            $files = \DB::table('M_LAMPIRAN_SSPD')->select('NAME')->where('ID', $lampiranID[$i])->first();
            $fileUplod = $files->name;

            if($request->hasFile($fileUplod)){ // jika ada file yg di upload
                // ambil nama file lalu hapus
                $getfiles = \DB::table('TBL_LAMPIRAN_SSPD')->select('NAMAFILE')
                        ->where([
                            ['kd_billing', $id],
                            ['id_mst_lampiran', $lampiranID[$i]]
                        ]);
                        
                if($getfiles->count() > 0){
                    $files = $getfiles->first();

                    if(File::exists(public_path('uploads/transaksi/'.$files->namafile))){
                        File::delete(public_path('uploads/transaksi/'.$files->namafile));
                    }

                    // upload file dengan nama yg di tentukan dan update nama file
                    $fileName = $id.'_'.$lampiranID[$i].'_'.uniqid().'.'.$request->$fileUplod->extension();
                    $request->$fileUplod->move(public_path('uploads/transaksi'), $fileName);

                    \DB::table('TBL_LAMPIRAN_SSPD')->where([
                            ['kd_billing', $id],
                            ['id_mst_lampiran', $lampiranID[$i]]
                        ])
                        ->update([
                            'NAMAFILE' => $fileName,
                            'UPDATED_AT' => date('Y-m-d H:i:s')
                        ]);
                }else {
                    // upload file dengan nama yg di tentukan dan update nama file
                    $fileName = $id.'_'.$lampiranID[$i].'_'.uniqid().'.'.$request->$fileUplod->extension();
                    $request->$fileUplod->move(public_path('uploads/transaksi'), $fileName);

                    \DB::table('TBL_LAMPIRAN_SSPD')->insert([
                        'ID' => \DB::table('TBL_LAMPIRAN_SSPD')->max('id') + 1,
                        'ID_MST_LAMPIRAN' => $lampiranID[$i],
                        'NAMAFILE' => $fileName,
                        'KD_BILLING' => $id,
                        'CREATED_AT' => date('Y-m-d H:i:s'),
                        'UPDATED_AT' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        return $id;
    }
}
