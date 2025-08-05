<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\SspdRequest;
use Illuminate\Support\Number;
use App\Models\TahunModel;
use App\Models\JenisSuratTanah;
use App\Models\StatusPernikahan;
use App\Services\SspdService;
use App\Models\DataTransaksi;
use App\Models\Pembeli;
use App\Models\Penjual;

use PDF;

class SspdController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user()->id_register;
        Number::useLocale('id'); // 'id' for Indonesian locale
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data SSPD";
        $data_transaksi = DataTransaksi::select('tbl_data_transaksi.nop','tbl_data_transaksi.tgl_rekam','tbl_data_transaksi.kd_booking','tbl_data_transaksi.alamat_op','tbl_data_transaksi.bphtb_yg_harus_dibayar','jenis_perolehan_hak.nm_perolehan')
            ->where([
                ['reg_ppat', $this->user],
                ['is_active', 1]
            ])
            ->leftJoin('jenis_perolehan_hak', 'jenis_perolehan_hak.kd_perolehan','=','tbl_data_transaksi.jns_perolehan')
            ->get();

        return view('pages.sspd', compact('title','data_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun = TahunModel::where('status', 1)->orderBy('sorting')->get();
        $jnsSuratTanah = JenisSuratTanah::where('is_active', 1)->get();

        $jns_perolehan = \DB::table('JENIS_PEROLEHAN_HAK')->where([
            ['STATUS', 1],
            ['ACCESS_NOTARIS', 1]
        ])
            ->orderBy('KD_PEROLEHAN')
            ->get();

        $referensikb = \DB::table('tbl_kurang_bayar as a')->select('a.nop', 'a.kd_booking', 'a.nm_pembeli', 'a.no_ketetapan_kb', 'tgl_ketetapan_kb', 'jumlah_kb')
            ->leftJoin('tbl_data_transaksi as b', 'b.kd_booking', '=', 'a.kd_booking')
            ->where('b.reg_ppat', $this->user)
            ->orderBy('a.tgl_rekam_kb', 'DESC')
            ->get();

        $jns_kelamin = StatusPernikahan::where('is_active', 1)->get();
        $lampiran = \DB::table('M_LAMPIRAN_SSPD')->where('IS_ACTIVE', 1)->orderBy('id', 'ASC')->get();

        return view('pages.sspd_create', compact('tahun', 'jns_perolehan', 'referensikb', 'jnsSuratTanah', 'jns_kelamin', 'lampiran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SspdRequest $request) 
    {
        $bookId = SspdService::createSSPD($request);

        if(!empty($bookId)){ 
            return redirect()->route('konfirmsspd')->with(['bookId' => $bookId]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kd_billing)
    {
        $tahun = TahunModel::where('status', 1)->orderBy('sorting')->get();
        $jnsSuratTanah = JenisSuratTanah::where('is_active', 1)->get();

        $jns_perolehan = \DB::table('JENIS_PEROLEHAN_HAK')->where([
            ['STATUS', 1],
            ['ACCESS_NOTARIS', 1]
        ])
            ->orderBy('KD_PEROLEHAN')
            ->get();
        
        $referensikb = \DB::table('tbl_kurang_bayar as a')->select('a.nop', 'a.kd_booking', 'a.nm_pembeli')
            ->leftJoin('tbl_data_transaksi as b', 'b.kd_booking', '=', 'a.kd_booking')
            ->where('b.reg_ppat', $this->user)
            ->orderBy('a.tgl_rekam_kb', 'DESC')
            ->get();

        $jns_kelamin = StatusPernikahan::where('is_active', 1)->get();

        $data = DataTransaksi::where([
            ['kd_booking', $kd_billing],
            ['is_active', 1]
        ])
        ->first();

        $pembeli = Pembeli::where('kd_bphtb', $data->kd_bphtb)->first();
        $penjual = Penjual::where('kd_bphtb', $data->kd_bphtb)->first();

        $m_lampiran = \DB::table('M_LAMPIRAN_SSPD')->where('is_active', 1)->orderBy('id', 'asc')->get();
        $lampiran = \DB::table('tbl_lampiran_sspd')->select('namafile')->where('kd_billing', $kd_billing)->get();
        
        return view('pages.sspd_edit', compact('data', 'tahun', 'jns_perolehan', 'referensikb', 'jnsSuratTanah', 'jns_kelamin', 'pembeli', 'penjual', 'lampiran', 'm_lampiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $bookId)
    {
        SSPDService::updateSSPD($request, $bookId);
        return redirect()->route('sspd.index')->with('success_edit', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cekNOP(Request $request)
    {
        $nopAsli =  $request->nop;
        $nop = explode('.',$nopAsli);

        $sppt = \DB::table('pbb.dat_objek_pajak as a')
        ->select('a.jalan_op','b.nm_kecamatan', 'c.nm_kelurahan', 'a.blok_kav_no_op', 'rt_op', 'rw_op','total_luas_bumi','total_luas_bng','njop_bumi','njop_bng')
        ->leftJoin('pbb.ref_kecamatan as b', 'a.kd_kecamatan', '=', 'b.kd_kecamatan')
        ->leftJoin('pbb.ref_kelurahan as c', function($join){
            $join->on('a.kd_kelurahan','=','c.kd_kelurahan');
            $join->on('a.kd_kecamatan','=','c.kd_kecamatan');
        })
        ->where([
            ['a.KD_PROPINSI', $nop[0]],
            ['a.KD_DATI2', $nop[1]],
            ['a.KD_KECAMATAN', $nop[2]],
            ['a.KD_KELURAHAN', $nop[3]],
            ['a.KD_BLOK', $nop[4]],
            ['a.NO_URUT', $nop[5]],
            ['a.KD_JNS_OP', $nop[6]]
        ])
        ->get();

        foreach($sppt as $d):
            $data = [
                'jalan_op' => $d->jalan_op,
                'blok_kav_no' => $d->blok_kav_no_op,
                'rt_op' => $d->rt_op,
                'rw_op' => $d->rw_op,
                'nm_kecamatan' => $d->nm_kecamatan,
                'nm_kelurahan' => $d->nm_kelurahan,
                'total_luas_bumi' => $d->total_luas_bumi,
                'total_luas_bng' => $d->total_luas_bng,
                'njop_bumi' => $d->njop_bumi,
                'njop_bng' => $d->njop_bng
            ];
        endforeach;

        return json_encode($data);
    }

    public function cekPBB(Request $request){
        $nopAsli = $request->nop;
        $nop = explode('.',$nopAsli);
        $html = '';

        $datapbb = \DB::table('pospbb.sppt as a')
                ->select('a.thn_pajak_sppt', 'a.pbb_yg_harus_dibayar_sppt', 'a.status_pembayaran_sppt', 'b.tgl_pembayaran_sppt', 'b.pembayaran_sppt_ke', 'b.jml_sppt_yg_dibayar')
                ->leftJoin('pospbb.pembayaran_sppt as b', function($join){
                    $join->on('a.kd_kecamatan','=','b.kd_kecamatan');
                    $join->on('a.kd_kelurahan','=','b.kd_kelurahan');
                    $join->on('a.kd_blok','=','b.kd_blok');
                    $join->on('a.no_urut','=','b.no_urut');
                    $join->on('a.thn_pajak_sppt','=','b.thn_pajak_sppt');
                })
                ->where([
                    ['a.KD_PROPINSI', $nop[0]],
                    ['a.KD_DATI2', $nop[1]],
                    ['a.KD_KECAMATAN', $nop[2]],
                    ['a.KD_KELURAHAN', $nop[3]],
                    ['a.KD_BLOK', $nop[4]],
                    ['a.NO_URUT', $nop[5]],
                    ['a.KD_JNS_OP', $nop[6]]
                ])
                ->orderBy('a.thn_pajak_sppt', 'DESC')
                ->get();

        foreach($datapbb as $p):
            if($p->status_pembayaran_sppt === '1'){
                $sts_bayar = '<span class="legend-indicator bg-success"></span>Sdh Bayar';
            }else {
                $sts_bayar = '<span class="legend-indicator bg-danger"></span>Blm Bayar';
            }

            $html .= '
                <tr>
                    <td class="font-size-sm text-center">'.$p->thn_pajak_sppt.'</td>
                    <td class="text-right">
                        <span class="d-block font-size-sm">'. number_format($p->pbb_yg_harus_dibayar_sppt,0,',','.').'</span>
                    </td>
                    <td>
                        <span class="font-size-sm">'. ($p->status_pembayaran_sppt === '1' ? date("d M Y H:i:s", strtotime($p->tgl_pembayaran_sppt)) : '--') .'</span>
                    </td>
                    <td class="font-size-sm">'.$sts_bayar.'</td>
                </tr>
                ';
        endforeach;

        echo $html;
    }


    public function cekTunggakanPBB(Request $req)
    {
        $nop = explode('.',$req->nop);
        $jmlTunggakan = \DB::table('pospbb.sppt')
                ->select(\DB::raw('count(*) as tunggakan'))
                ->where([
                    ['KD_PROPINSI', $nop[0]],
                    ['KD_DATI2', $nop[1]],
                    ['KD_KECAMATAN', $nop[2]],
                    ['KD_KELURAHAN', $nop[3]],
                    ['KD_BLOK', $nop[4]],
                    ['NO_URUT', $nop[5]],
                    ['KD_JNS_OP', $nop[6]],
                    ['status_pembayaran_sppt', '0']
                ])
                ->orderBy('thn_pajak_sppt', 'DESC')
                ->first();

        return response()->json(['tunggakan' => $jmlTunggakan->tunggakan]);
    }

    public function konfirmasiSSPD()
    {
        $bookId = session()->get('bookId');
        // $bookId = '7010897383';
        $dataTrans = DataTransaksi::select('nop', 'bphtb_yg_harus_dibayar', 'kd_booking', 'alamat_op', 'p.nm_pembeli', 'p.alamat_pembeli', 'p.no_identitas_pembeli')
        ->leftJoin('tbl_pembeli as p', function($join){
            $join->on('tbl_data_transaksi.kd_bphtb', '=', 'p.kd_bphtb');
        })
        ->where([
            ['is_active', 1],
            ['kd_booking', $bookId]
        ])
        ->first();

        $data = [
            'title' => 'Tanda Terima Transaksi SSPD',
            'kd_billing' => $bookId,
            'data_transaksi' => $dataTrans
        ];

        return view('pages.konfirmasi_inputsspd', compact('data'));
    }

    public function buktiTransaksi($act, $bookid)
    {
        $dataTrans = DataTransaksi::select('nop', 'bphtb_yg_harus_dibayar', 'kd_booking', 'alamat_op', 'p.nm_pembeli', 'p.alamat_pembeli', 'p.no_identitas_pembeli')
        ->leftJoin('tbl_pembeli as p', function($join){
            $join->on('tbl_data_transaksi.kd_bphtb', '=', 'p.kd_bphtb');
        })
        ->where([
            ['is_active', 1],
            ['kd_booking', $bookid]
        ])
        ->first();

        $data = [
            'title' => 'PDF Testing',
            'kd_billing' => $bookid,
            'transaksi' => $dataTrans,
            'act' => $act
        ]; 

        if($act === 'pdf'){
            $pdf = PDF::loadView('pages.bukti_transaksi', $data)->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('pdf/personalpdf', compact('user','result'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download($bookid.'.pdf');
        }else {
            return view('pages.bukti_transaksi', $data);
        }
    }

    public function printSSPD($bookid) 
    {
        $dataTrans = DataTransaksi::select('nop', 'bphtb_yg_harus_dibayar', 'kd_booking', 'alamat_op', 'luas_tanah', 'luas_bng', 'njop_bumi', 'njop_bng', 'njop_total', 
        'harga_transaksi', 'npop', 'npoptkp', 'npopkp', 'peng_waris_hibah_wasiat', 'bphtb_terutang', 'jp.nm_perolehan', 'no_sertifikat', 'jns_setoran', 'jns_perolehan',
        'no_stb_skbkb', 'tgl_stb_skbkb', 'kel.nm_kelurahan', 'kec.nm_kecamatan', 
        'p.nm_pembeli', 'p.alamat_pembeli', 'p.no_identitas_pembeli', 'p.npwp_pembeli', 'p.blok_kav_no_pembeli', 'p.rt_pembeli', 'p.rw_pembeli', 'p.kota_pembeli', 'p.kecamatan_pembeli', 'p.kelurahan_pembeli')
        ->leftJoin('tbl_pembeli as p', function($join){
            $join->on('tbl_data_transaksi.kd_bphtb', '=', 'p.kd_bphtb');
        })
        ->leftJoin('ref_kecamatan as kec', 'tbl_data_transaksi.kecamatan', '=', 'kec.kd_kecamatan')
        ->leftJoin('ref_kelurahan as kel', function($join){
            $join->on('tbl_data_transaksi.kelurahan', '=', 'kel.kd_kelurahan')
            ->where('kel.kd_kecamatan', '=', 'tbl_data_transaksi.kecamatan');
        })
        ->leftJoin('jenis_perolehan_hak as jp', 'tbl_data_transaksi.jns_perolehan', '=', 'jp.kd_perolehan')
        ->where([
            ['is_active', 1],
            ['kd_booking', $bookid]
        ])
        ->first();

        $data = [
            'kd_billing' => $bookid,
            'trans' => $dataTrans
        ]; 

        // if($act === 'pdf'){
            // $pdf = PDF::loadView('pages.pdf_sspd', $data)->setOptions(['defaultFont' => 'sans-serif']);
            // return $pdf->download('sspd_'.$bookid.'.pdf');
        // }else {
            return view('pages.pdf_sspd', $data);
        // }
    }

    public function lampiranView($bookId, $idmstlampiran)
    {
        $data = \DB::table('tbl_lampiran_sspd')->select('namafile')->where([
            ['kd_billing', $bookId],
            ['id_mst_lampiran', $idmstlampiran]
        ]);

        if($data->count() > 0){
            $lampiran = $data->first();
            $fileLampiran = [
                'lampiran' => $lampiran->namafile
            ];
        }else {
            $fileLampiran = [
                'lampiran' => 0
            ];
        }

        return view('pages.lampiran_sspd_view', $fileLampiran);
    }

    public function hapusSSPD(Request $request)
    {
        $kd_billing = $request->kd_billing;

        $hapus = DataTransaksi::where('kd_booking', $kd_billing)->update(['is_active' => 0]);

        if($hapus){
            return redirect()->route('sspd.index')->with(['success_edit' => 'Data Berhasil Dihapus.']);
        }else {
            return redirect()->route('sspd.index')->with(['success_edit' => 'Data Gagal Dihapus.']);
        }
    }

    public function cekTransaksiNIK(Request $request) 
    {
        $jns_perolehan = $request->jp;
        $nik = $request->nik;
        // $nik = '2171111406880001';

        if($jns_perolehan === '01' || $jns_perolehan === '08' || $jns_perolehan === '03' || $jns_perolehan === '21')
        {
            $data = Pembeli::where('no_identitas_pembeli', $nik)->count();
        }else {
            $data = 0;
        }

        return json_encode(['jmlTransaksiNik' => $data]);
    }

    public function CreateKB($kd_billing)
    {
        $tahun = TahunModel::where('status', 1)->orderBy('sorting')->get();
        $jnsSuratTanah = JenisSuratTanah::where('is_active', 1)->get();

        $jns_perolehan = \DB::table('JENIS_PEROLEHAN_HAK')->where([
            ['STATUS', 1],
            ['ACCESS_NOTARIS', 1]
        ])
            ->orderBy('KD_PEROLEHAN')
            ->get();
        
        $kb = \DB::table('tbl_kurang_bayar')->select('nop', 'no_ketetapan_kb', \DB::raw("TO_CHAR(tgl_ketetapan_kb, 'DD MON YYYY') as tgl_ketetapan_kb"), 'jumlah_kb', 'npop_koreksi', 'npoptkp', 'npopkp')
            ->where('kd_booking', $kd_billing)
            ->orderBy('tgl_rekam_kb', 'DESC')
            ->first();

        $jns_kelamin = StatusPernikahan::where('is_active', 1)->get();

        $data = DataTransaksi::where([
            ['kd_booking', $kd_billing],
            ['is_active', 1]
        ])
        ->first();

        $pembeli = Pembeli::where('kd_bphtb', $data->kd_bphtb)->first();
        $penjual = Penjual::where('kd_bphtb', $data->kd_bphtb)->first();

        $m_lampiran = \DB::table('M_LAMPIRAN_SSPD')->where('is_active', 1)->orderBy('id', 'asc')->get();
        $lampiran = \DB::table('tbl_lampiran_sspd')->select('namafile')->where('kd_billing', $kd_billing)->get();
        
        return view('pages.kurangbayar', compact('data', 'tahun', 'jns_perolehan', 'kb', 'jnsSuratTanah', 'jns_kelamin', 'pembeli', 'penjual', 'lampiran', 'm_lampiran'));
    }
}
