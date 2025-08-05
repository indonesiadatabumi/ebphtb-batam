    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Input Billing Kurang Bayar | EBPHTB </title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://bapenda.batam.go.id/favicon.ico" />

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link href="{{ asset('assets/vendor/icon-set/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">

        <!-- CSS Front Template -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

        <!-- CSS Datatables -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/jquery.dataTables.min.css') }}">
    </head>

    <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

    <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js') }}"></script>

    <!-- ========== HEADER ========== -->
        <x-header></x-header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->
        <x-navbar></x-navbar>
    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">

            <!-- Step Form -->
            <form class="js-step-form js-validate py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": true
              }' method="post" action="{{ route('sspd.store') }}" enctype="multipart/form-data" id="formTransaksiKB">
              @csrf
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10 mt-2">
                        <!-- Step -->
                        <ul id="addUserStepFormProgress" class="js-step-progress step step-sm step-icon-sm step step-inline step-item-between mb-3 mb-md-5">
                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
                                        "targetSelector": "#addObjekPajak"
                                        }'>
                                    <span class="step-icon step-icon-soft-dark">1</span>
                                    <div class="step-content">
                                        <span class="step-title">Data Objek Pajak</span>
                                    </div>
                                </a>
                            </li>

                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
                                        "targetSelector": "#addPembeli"
                                        }' style="pointer-events: none;">
                                    <span class="step-icon step-icon-soft-dark">2</span>
                                    <div class="step-content">
                                        <span class="step-title">Data Pembeli</span>
                                    </div>
                                </a>
                            </li>

                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
                                        "targetSelector": "#stepAddPenjual"
                                        }' style="pointer-events: none;">
                                    <span class="step-icon step-icon-soft-dark">3</span>
                                    <div class="step-content">
                                        <span class="step-title">Data Penjual</span>
                                    </div>
                                </a>
                            </li>

                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
                                        "targetSelector": "#addLampiran"
                                        }' style="pointer-events: none;">
                                    <span class="step-icon step-icon-soft-dark">4</span>
                                    <div class="step-content">
                                        <span class="step-title">Lampiran</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End Step -->

                        <!-- Content Step Form -->
                        <div id="addUserStepFormContent">                            
                            <!-- Card input objek pajak-->
                            <div id="addObjekPajak" class="card card-lg active">
                                <!-- Body -->
                                <div class="card-body">
                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Tahun Pajak</label>

                                        <div class="col-sm-4">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                data-hs-select2-options='{
                                                    "placeholder": "Pilih Tahun",
                                                    "searchInputPlaceholder": "Cari tahun"
                                                    }' name="tahun" id="tahun">
                                                @foreach($tahun as $t)
                                                <option value="{{ $t->tahun }}" @if($data->tahun === $t->tahun) selected @endif>{{ $t->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jenis Perolehan</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                    data-hs-select2-options='{
                                                        "placeholder": "Pilih Jenis Perolehan",
                                                        "searchInputPlaceholder": "Cari jenis perolehan"
                                                        }' name="jns_perolehan" id="jns_perolehan" data-msg="Pilih jenis perolehan." required>
                                                    <option label="empty"></option>
                                                    @foreach($jns_perolehan as $jp)
                                                    <option value="{{ $jp->kd_perolehan }}" @if($data->jns_perolehan === $jp->kd_perolehan) selected @endif>{{ $jp->kd_perolehan }}. {{ $jp->nm_perolehan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Objek Pajak</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="js-masked-input form-control" data-hs-mask-options='{
                                            "template": "00.00.000.000.000.0000.0"
                                            }' name="nop" id="nop" value="{{ $data->nop }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group riwayat-pbb" style="display:none;">
                                        <label class="col-sm-3 col-form-label input-label">&nbsp;</label>
                                        <div class="col-sm-9">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="input-label">Riwayat Pembayaran PBB</label>
                                                </div>

                                                <!-- Table -->
                                                <div class="table-responsive datatable-custom">
                                                    <table id="basicDatatable" class="table table-thead-bordered table-nowrap table-align-middle card-table table-hover"
                                                        data-hs-datatables-options='{
                                                            "order": []
                                                        }'>
                                                    <thead class="thead-light">
                                                        <tr>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Tagihan</th>
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="data-history-pbb">
                                                    </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Table -->
                                            </div>
                                            <div style="color:#f31616; display: none;" class="mt-2" id="notif-tunggakan">
                                            Transaksi tidak dapat dilanjutkan karena terdapat tunggakan pbb.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Alamat </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" aria-label="alamat">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Blok/ Kav/ No. </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="blok_kav" id="blok_kav_no" placeholder="blok/ kav/ No" aria-label="blok_kav">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">RT / RW</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rt" id="rt_op" placeholder="RT" aria-label="rt">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rw" id="rw_op" placeholder="RW" aria-label="rw">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kelurahan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" aria-label="kelurahan">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kecamatan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" aria-label="kecamatan">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kota </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" aria-label="kota" value="BATAM">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kode Pos </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kode pos" aria-label="kodepos">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Legalitas Kepemilikan Tanah</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                    data-hs-select2-options='{
                                                        "placeholder": "Pilih Legalitas",
                                                        "searchInputPlaceholder": "Cari Legalitas"
                                                        }' name="legalitas_hak" required data-msg="Pilih legalitas kepemilikan tanah.">
                                                    <option label="empty"></option>
                                                    @foreach($jnsSuratTanah as $st)
                                                    <option value="{{ $st->kd_hak }}" @if(trim($data->kd_hak) === trim($st->kd_hak)) selected @endif>{{ $st->nm_hak }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Sertifikat</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control" name="no_sertifikat" value="{{ $data->no_sertifikat }}" required data-msg="Masukan nomor sertifikat">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Luas Tanah </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="luastanah" id="luastanah" placeholder="Luas tanah" aria-label="luastanah" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NJOP Tanah </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control" name="njoptanah" id="njoptanah" placeholder="Njop tanah" aria-label="njoptanah"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Luas Bangunan </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="luasbng" id="luasbng" placeholder="Luas bng" aria-label="luasbng" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NJOP Bangunan </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" name="njopbng" id="njopbng" placeholder="Njop bng" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NJOP Total </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control" name="njoptotal" id="njoptotal" placeholder="Njop total" aria-label="njoptotal"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Harga Transaksi </label>
                                        <div class="col-sm-4">
                                            <div class="js-form-message">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="js-masked-input form-control" name="hargatransaksi" id="hargatransaksi" value="{{ $kb->npop_koreksi }}"
                                                    data-hs-mask-options='{
                                                        "template": "#.##0",
                                                        "selectOnFocus": true,
                                                        "reverse": true
                                                    }' required data-msg="Masukan harga transaksi." readonly>
                                                    <!-- <div class="input-group has-validation">
                                                        <span class="input-group-text" id="inputHargaTransaksi">Rp</span>
                                                        <input type="text" class="form-control" id="hargatransaksi" aria-describedby="inputHargaTransaksi" required>
                                                        <div class="invalid-feedback">
                                                            Silahkan masukan harga transaksi.
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPOP (Nilai Perolahan Objek Pajak) </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control" name="npop" id="npop" value="{{ $kb->npop_koreksi}}"
                                                    data-hs-mask-options='{
                                                        "template": "#.##0",
                                                        "selectOnFocus": true,
                                                        "reverse": true
                                                    }' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPOPTKP (Nilai Perolehan Objek Pajak Tidak Kena Pajak) </label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control col-sm-4" name="npoptkp" id="npoptkp" value="{{ $kb->npoptkp }}"
                                                    data-hs-mask-options='{
                                                        "template": "#.##0",
                                                        "selectOnFocus": true,
                                                        "reverse": true
                                                    }' readonly>
                                            </div>
                                            <div class="mt-3">
                                                <!-- Checkbox -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="CheckMulitpleNOP" class="custom-control-input" name="checkMultipleNOP">
                                                    <label class="custom-control-label" for="CheckMulitpleNOP">Klik jika transaksi kedua atau lebih dari 1 objek pajak dari pembeli yg sama dl masa 1 tahun. (tanpa NPOPTKP)</label>
                                                </div>
                                                <!-- End Checkbox -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPOPKP (Nilai Perolehan Objek Kena Pajak Kena Pajak) </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control"  name="npopkp" id="npopkp" value="{{ $kb->npopkp }}"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 text-muted">
                                            (NPOP - NPOPTKP)
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">BPHTB Terutang </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control" name="bphtb" id="bphtb" value="{{ $kb->jumlah_kb }}"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 text-muted">
                                            (5% x NPOPKP)
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Pengurangan (%)</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="pengurangan" id="pengurangan" value="{{ $data->peng_waris_hibah_wasiat }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">BPHTB yang Harus Dibayar </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control" name="bphtb_dibayar" id="bphtb_dibayar" value="{{ $kb->jumlah_kb }}"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jumlah Setoran Berdasarkan </label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jns_setoran" id="customRadio1" value="1" disabled>
                                                <label class="form-check-label" for="customRadio1">
                                                    Penghitungan Wajib Pajak
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jns_setoran" id="customRadio2" value="2" checked>
                                                <label class="form-check-label" for="customRadio2">
                                                    SKPDKB (Surat Ketetapan Pajak Daerah Kurang Bayar)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group nomorKB">
                                        <label class="col-sm-3 col-form-label input-label">&nbsp; </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="nomorKB" id="nomorKB" value="{{ $kb->no_ketetapan_kb }}" readonly>
                                            <small class="text-muted">nomor penetapan kurang bayar.</small>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control form-control text-center" type="text" id="tanggalKB"  value="{{ $kb->tgl_ketetapan_kb }}" readonly>
                                            <small class="text-muted">tanggal kb.</small>
                                        </div>
                                        <div class="col-sm-2">
                                                <input type="text" class="js-masked-input form-control text-right" name="jumlahKB" id="jumlahKB" value="{{ $kb->jumlah_kb }}"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' readonly>

                                            <!-- <input class="form-control form-control-sm text-right" type="text" id="jumlahKB"  value="{{ $kb->jumlah_kb }}"> -->
                                            <small class="text-muted">jumlah kb.</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Dokumen Pendukung Pemesanan Rumah/ PPJB/ KJB antara Developer dan Pembeli </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="dokPendukung" id="dokPendukung" value="{{ $data->no_dok_pendukung }}">
                                        </div>
                                        <div class="col-sm-3">
                                            <div id="projectDeadlineNewProjectFlatpickr" class="js-flatpickr flatpickr-custom input-group input-group-merge"
                                                data-hs-flatpickr-options='{
                                                    "appendTo": "#projectDeadlineNewProjectFlatpickr",
                                                    "dateFormat": "d/m/Y",
                                                    "wrap": true
                                                }' name="tgl_dokPendukung">
                                                <div class="input-group-prepend" data-toggle>
                                                    <div class="input-group-text">
                                                        <i class="tio-date-range"></i>
                                                    </div>
                                                </div>

                                                <input type="text" class="flatpickr-custom-form-control form-control" id="projectDeadlineFlatpickrNewProjectLabel" placeholder="Select dates" data-input value="{{ $data->tgl_dok_pendukung }}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Keterangan </label>
                                        <div class="col-sm-9">
                                            <textarea id="exampleFormControlTextarea1" name="keterangan" class="form-control" rows="4">{{ $data->keterangan_op }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Status Rumah/ Bangunan </label>
                                        <div class="col-sm-9">
                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio1" class="custom-control-input" name="status_bgn" value="1" @if($data->status_bgn === '1') checked @endif>
                                                    <label class="custom-control-label" for="customInlineRadio1">1. Baru</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->

                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio2" class="custom-control-input indeterminate-checkbox" value="2" name="status_bgn" @if($data->status_bgn === '2') checked @endif>
                                                    <label class="custom-control-label" for="customInlineRadio2">2. Bekas</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->

                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio3" class="custom-control-input indeterminate-checkbox" value="3" name="status_bgn" @if($data->status_bgn === '3') checked @endif>
                                                    <label class="custom-control-label" for="customInlineRadio3">3. Tidak ada bangunan/ rumah</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-primary" data-hs-step-form-next-options='{
                                            "targetSelector": "#addPembeli"
                                            }' id="next1-btn">
                                    Next <i class="tio-chevron-right"></i>
                                    </button>
                                </div>
                                <!-- End Footer -->
                            </div>
                            <!-- End Card -->

                            <!-- Form input Pembeli -->
                            <div id="addPembeli" class="card card-lg" style="display: none;">
                                <!-- Body -->
                                <div class="card-body">

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Identitas </label>
                                        <div class="col-sm-2">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;" data-hs-select2-options='{
                                                    "placeholder": "Pilih Jenis Identitas",
                                                    "searchInputPlaceholder": "Jenis Identitas"
                                                    }' name="jns_identitas">
                                                <option value="KTP" @if($pembeli->jns_identitas_pembeli === 'KTP') selected @endif>KTP</option>
                                                <option value="SIM" @if($pembeli->jns_identitas_pembeli === 'SIM') selected @endif>SIM</option>
                                                <option value="Passport" @if($pembeli->jns_identitas_pembeli === 'Passport') selected @endif>Passport</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control" name="nik_pembeli" id="nik_pembeli" value="{{ $pembeli->no_identitas_pembeli }}" required data-msg="Silahkan isi nik pembeli">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NIB (Nomor Induk Berusaha) </label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="nib_pembeli" id="nib_pembeli" value="{{ $pembeli->nib_pembeli }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="text-muted font-size-1">(jika perusahaan/ yayasan/ organisasi)</span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nama Lengkap </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" aria-label="nama pembeli" value="{{ $pembeli->nm_pembeli}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jenis Kelamin </label>
                                        <div class="col-sm-9">
                                            <div class="form-row">
                                                <div class="col-sm mb-2 mb-sm-0">
                                                    <!-- Custom Radio -->
                                                    <div class="form-control">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="jk_pembeli" id="formControlRadioJK1" value="1" @if($pembeli->jns_kel_pembeli === '1') checked @endif>
                                                            <label class="custom-control-label">Laki-laki</label>
                                                        </div>
                                                    </div>
                                                    <!-- End Custom Radio -->
                                                </div>

                                                <div class="col-sm mb-2 mb-sm-0">
                                                    <!-- Custom Radio -->
                                                    <div class="form-control">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="jk_pembeli" id="formControlRadioJK2" value="2" @if($pembeli->jns_kel_pembeli === '2') checked @endif>
                                                            <label class="custom-control-label">Perempuan</label>
                                                        </div>
                                                    </div>
                                                    <!-- End Custom Radio -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Tempat dan Tanggal Lahir </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="tptlahir_pembeli" id="tptlahir_pembeli" value="{{ $pembeli->tempat_lahir_pembeli }}">
                                        </div>
                                        <div class="col-sm-3">
                                            <div id="tglLahirPembeli" class="js-flatpickr flatpickr-custom input-group input-group-merge"
                                                data-hs-flatpickr-options='{
                                                    "appendTo": "#tglLahirPembeli",
                                                    "dateFormat": "d/m/Y",
                                                    "wrap": true
                                                }' name="tgl_dokPendukung">
                                                <div class="input-group-prepend" data-toggle>
                                                    <div class="input-group-text">
                                                        <i class="tio-date-range"></i>
                                                    </div>
                                                </div>

                                                <input type="text" class="flatpickr-custom-form-control form-control" name="tglLahirPembeli" id="tglLahirPembeliLabel" value="{{ $pembeli->tgl_lahir_pembeli }}" data-input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Status Perkawinan </label>
                                        <div class="col-sm-4">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;" data-hs-select2-options='{
                                                    "placeholder": "Status perkawinan",
                                                    "searchInputPlaceholder": "Cari status perkawinan"
                                                    }' name="sts_kawin_pembeli">
                                                <option label="empty"></option>
                                                @foreach($jns_kelamin as $jk)
                                                <option value="{{ $jk->id }}" @if($pembeli->stat_kawin_pembeli == $jk->id) selected @endif>{{ $jk->status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Pekerjaan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pekerjaan_pembeli" id="pekerjaan_pembeli" value="{{ $pembeli->jns_pekerjaan_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Alamat </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="alamat_pembeli" id="alamat_pembeli" value="{{ $pembeli->alamat_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Blok/ Kav/ No. </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="blok_kav_pembeli" id="blok_kav_pembeli" value="{{ $pembeli->blok_kav_no_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">RT / RW</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rt_pembeli" id="rt_pembeli" value="{{ $pembeli->rt_pembeli }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rw_pembeli" id="rw_pembeli" value="{{ $pembeli->rw_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kelurahan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kelurahan_pembeli" id="kelurahan_pembeli" value="{{ $pembeli->kelurahan_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kecamatan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kecamatan_pembeli" id="kecamatan_pembeli" value="{{ $pembeli->kecamatan_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kota </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kota_pembeli" id="kota_pembeli" value="{{ $pembeli->kota_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kode Pos </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="kodepos_pembeli" id="kodepos_pembeli" value="{{ $pembeli->kodepos_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor HP </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="hp_pembeli" id="hp_pembeli" value="{{ $pembeli->hp_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Email </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="email_pembeli" id="email_pembeli" value="{{ $pembeli->email_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPWP </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="npwp_pembeli" id="npwp_pembeli" value="{{ $pembeli->npwp_pembeli }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Keterangan </label>
                                        <div class="col-sm-9">
                                            <textarea id="keterangan_pembeli" class="form-control" placeholder="Keterangan" rows="4" name="ket_pembeli">{{ $pembeli->keterangan_pembeli }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex align-items-center">
                                    <button type="button" class="btn btn-ghost-secondary"
                                        data-hs-step-form-prev-options='{
                                            "targetSelector": "#addObjekPajak"
                                        }'>
                                        <i class="tio-chevron-left"></i> Previous step
                                    </button>

                                    <div class="ml-auto">
                                        <button type="button" class="btn btn-primary"
                                            data-hs-step-form-next-options='{
                                                "targetSelector": "#stepAddPenjual"
                                            }'>
                                            Next <i class="tio-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>

                            <!-- Form input penjual -->
                            <div id="stepAddPenjual" class="card card-lg" style="display: none;">
                                <!-- Body -->
                                <div class="card-body">

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Identitas </label>
                                        <div class="col-sm-2">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;" data-hs-select2-options='{
                                                    "placeholder": "Jenis Identitas",
                                                    "searchInputPlaceholder": "Cari Jenis Identitas"
                                                    }' name="jns_identitas_pj">
                                                <option value="KTP" @if($pembeli->jns_identitas_penjual === 'KTP') selected @endif>KTP</option>
                                                <option value="SIM" @if($pembeli->jns_identitas_penjual === 'SIM') selected @endif>SIM</option>
                                                <option value="Passport" @if($pembeli->jns_identitas_penjual === 'Passport') selected @endif>Passport</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control" name="nik_penjual" id="nik_penjual" value="{{ $penjual->no_identitas_penjual }}" required data-msg="Silahkan isi nik penjual.">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NIB (Nomor Induk Berusaha) </label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="nib_penjual" id="nib_penjual" value="{{ $penjual->nib_penjual }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="text-muted font-size-1">(jika perusahaan/ yayasan/ organisasi)</span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nama Lengkap </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_penjual" id="nama_penjual" aria-label="nama penjual" value="{{ $penjual->nm_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jenis Kelamin </label>
                                        <div class="col-sm-9">
                                            <div class="form-row">
                                                <div class="col-sm mb-2 mb-sm-0">
                                                    <!-- Custom Radio -->
                                                    <div class="form-control">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="jk_penjual" id="formControlRadioEg3" value="1" @if($penjual->jns_kel_penjual === '1') checked @endif>
                                                            <label class="custom-control-label" for="formControlRadioEg3">Laki-laki</label>
                                                        </div>
                                                    </div>
                                                    <!-- End Custom Radio -->
                                                </div>

                                                <div class="col-sm mb-2 mb-sm-0">
                                                    <!-- Custom Radio -->
                                                    <div class="form-control">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="jk_penjual" id="formControlRadioEg4" value="2" @if($penjual->jns_kel_penjual === '2') checked @endif>
                                                            <label class="custom-control-label" for="formControlRadioEg4">Perempuan</label>
                                                        </div>
                                                    </div>
                                                    <!-- End Custom Radio -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Tempat dan Tanggal Lahir </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="tptlahir_penjual" id="tptlahir_penjual" value="{{ $penjual->tempat_lahir_penjual }}">
                                        </div>
                                        <div class="col-sm-3">
                                            <div id="tglLahirPenjual" class="js-flatpickr flatpickr-custom input-group input-group-merge"
                                                data-hs-flatpickr-options='{
                                                    "appendTo": "#tglLahirPenjual",
                                                    "dateFormat": "d/m/Y",
                                                    "wrap": true
                                                }'>
                                                <div class="input-group-prepend" data-toggle>
                                                    <div class="input-group-text">
                                                        <i class="tio-date-range"></i>
                                                    </div>
                                                </div>

                                                <input type="text" class="flatpickr-custom-form-control form-control" name="tglLahirPenjual" id="tglLahirPenjualLabel"value="{{ $penjual->tgl_lahir_penjual }}" data-input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Status Perkawinan </label>
                                        <div class="col-sm-4">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;" data-hs-select2-options='{
                                                    "placeholder": "Status perkawinan",
                                                    "searchInputPlaceholder": "Status perkawinan"
                                                    }' name="sts_kawin_penjual">
                                                <option label="empty"></option>
                                                @foreach($jns_kelamin as $jk)
                                                <option value="{{ $jk->id }}" @if($penjual->stat_kawin_penjual == $jk->id) selected @endif>{{ $jk->status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Pekerjaan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pekerjaan_penjual" id="pekerjaan_penjual" value="{{ $penjual->jns_pekerjaan_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Alamat </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="alamat_penjual" id="alamat_penjual" value="{{ $penjual->alamat_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Blok/ Kav/ No. </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="blok_kav_penjual" id="blok_kav_penjual" value="{{ $penjual->blok_kav_no_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">RT / RW</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rt_penjual" id="rt_penjual" value="{{ $penjual->rt_penjual }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rw_penjual" id="rw_penjual" value="{{ $penjual->rw_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kelurahan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kelurahan_penjual" id="kelurahan_penjual" value="{{ $penjual->kelurahan_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kecamatan </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kecamatan_penjual" id="kecamatan_penjual" value="{{ $penjual->kecamatan_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kota </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kota_penjual" id="kota_penjual" value="{{ $penjual->kota_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kode Pos </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="kodepos_penjual" id="kodepos_penjual" value="{{ $penjual->kodepos_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor HP </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="hp_penjual" id="hp_penjual" value="{{ $penjual->hp_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Email </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="email_penjual" id="email_penjual" value="{{ $penjual->email_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPWP </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="npwp_penjual" id="npwp_penjual" value="{{ $penjual->npwp_penjual }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Keterangan </label>
                                        <div class="col-sm-9">
                                            <textarea id="keterangan_penjual" class="form-control" placeholder="Keterangan" rows="4" name="ket_penjual">{{ $penjual->keterangan_penjual }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex align-items-center">
                                    <button type="button" class="btn btn-ghost-secondary"
                                        data-hs-step-form-prev-options='{
                                            "targetSelector": "#addPembeli"
                                        }'>
                                        <i class="tio-chevron-left"></i> Previous step
                                    </button>

                                    <div class="ml-auto">
                                        <button type="button" class="btn btn-primary"
                                            data-hs-step-form-next-options='{
                                                "targetSelector": "#addLampiran"
                                            }'>
                                            Next <i class="tio-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>

                            <!-- Form lampiran -->
                            <div id="addLampiran" class="card card-lg" style="display: none;">

                                <!-- Body -->
                                <div class="card-body">
                                    @foreach($m_lampiran as $ml)
                                        <div class="row form-group">
                                            <input type="hidden" name="lampiranID[]" value="{{ $ml->id }}">
                                            <label class="col-sm-3 col-form-label input-label">{{ $ml->title }} </label>

                                            <div class="col-sm-9">
                                                <a onclick="lampiranView('{{ $data->kd_booking }}','{{ $ml->id }}')" style="cursor: pointer;">[Lihat File]</a>
                                                <div class="custom-file">
                                                    <input type="file" class="js-file-attach custom-file-input" id="{{ $ml->name }}"
                                                        data-hs-file-attach-options='{
                                                                "textTarget": "[for=\"{{ $ml->name }}\"]"
                                                            }' name="{{ $ml->name }}">
                                                    <label class="custom-file-label" for="{{ $ml->name }}">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-sm-flex align-items-sm-center">
                                    <button type="button" class="btn btn-ghost-secondary mb-2 mb-sm-0"
                                        data-hs-step-form-prev-options='{
                                            "targetSelector": "#stepAddPenjual"
                                        }'>
                                        <i class="tio-chevron-left"></i> Previous step
                                    </button>

                                    <div class="ml-auto">
                                        <button type="submit" class="btn btn-primary" id="btnTransaksiEdit">Submit Data </button>
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>
                        </div>
                        <!-- End Content Step Form -->

                        <!-- Message Body --
                        <div id="successMessageContent">
                            <div class="text-center">
                                <img class="img-fluid mb-3" src="{{ asset('assets/svg/illustrations/hi-five.svg') }}" alt="Image Description" style="max-width: 15rem;">

                                <div class="mb-4">
                                    <h2>Successful!</h2>
                                    <p><span class="font-weight-bold text-dark">Transaksi SSPD berhasil dibuat.</p>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-white mr-3" href="{{ route('sspd.index') }}">
                                        <i class="tio-chevron-left ml-1"></i> Kembali ke Daftar SSPD
                                    </a>
                                    <a class="btn btn-primary" href="">
                                        <i class="tio-print mr-1"></i> Cetak Bukti Transaksi
                                    </a>
                                </div>
                            </div>
                        </div>
                        !-- End Message Body -->
                    </div>
                </div>
                <!-- End Row -->
            </form>
            <!-- End Step Form -->
        </div>
        <!-- End Content -->

        <!-- Footer -->
        <x-footer></x-footer>
        <!-- End Footer -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Global Compulsory  -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-form-search/dist/hs-form-search.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-file-attach/dist/hs-file-attach.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-step-form/dist/hs-step-form.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-add-field/dist/hs-add-field.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS Front -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // =======================================================

            // BUILDER TOGGLE INVOKER
            // =======================================================
            $('.js-navbar-vertical-aside-toggle-invoker').click(function() {
                $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
            });


            // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
            // =======================================================
            var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

            // INITIALIZATION OF TOOLTIP IN NAVBAR VERTICAL MENU
            // =======================================================
            $('.js-nav-tooltip-link').tooltip({
                boundary: 'window'
            })

            $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
                if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                    return false;
                }
            });


            // INITIALIZATION OF UNFOLD
            // =======================================================
            $('.js-hs-unfold-invoker').each(function() {
                var unfold = new HSUnfold($(this)).init();
            });


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            $('.js-form-search').each(function() {
                new HSFormSearch($(this)).init()
            });


            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            $('.js-file-attach').each(function() {
                var customFile = new HSFileAttach($(this)).init();
            });


            // INITIALIZATION OF STEP FORM
            // =======================================================
            $('.js-step-form').each(function() {
                var stepForm = new HSStepForm($(this), {
                    finish: function() {
                        $("#addUserStepFormProgress").hide();
                        $("#addUserStepFormContent").hide();
                        // $("#successMessageContent").show();
                    }
                }).init();
            });

            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
            $.HSCore.components.HSValidation.init($(this));
            });

            // INITIALIZATION OF MASKED INPUT
            // =======================================================
            $('.js-masked-input').each(function() {
                var mask = $.HSCore.components.HSMask.init($(this));
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });


            // INITIALIZATION OF ADD INPUT FILED
            // =======================================================
            $('.js-add-field').each(function() {
                new HSAddField($(this), {
                    addedField: function() {
                        $('.js-add-field .js-select2-custom-dynamic').each(function() {
                            var select2dynamic = $.HSCore.components.HSSelect2.init($(this));
                        });
                    }
                }).init();
            });

            // INITIALIZATION OF FLATPICKR
            // =======================================================
            $('.js-flatpickr').each(function () {
                $.HSCore.components.HSFlatpickr.init($(this));
            });

            // Get Pengurangan
            $('#jns_perolehan').on('change', function(){
                let jnsperolehan = $(this).find(":selected").val();

                if(jnsperolehan === '01' || jnsperolehan === '03' || jnsperolehan === '05' || jnsperolehan === '08' || jnsperolehan === '10' || jnsperolehan === '11' || jnsperolehan === '12'){
                    $('#pengurangan').val(0);
                }else if(jnsperolehan === '04'){
                    $('#pengurangan').val(50);
                }else if(jnsperolehan === '23' || jnsperolehan === '25' || jnsperolehan === '26' || jnsperolehan === '27' || jnsperolehan === '30' || jnsperolehan === '31'){
                    $('#pengurangan').val(100);
                }else {
                    $('#pengurangan').val(0);
                }
            })

            $('#tahun').on('change', function(){
                let tahun = $(this).find(":selected").val();

                if(tahun >= 2024){
                    $('#npoptkp').val(format_ribuan(120000000));
                }else {
                    $('#npoptkp').val(format_ribuan(70000000));
                }
            })

            let nop = $('#nop').val();
            if(nop.length > 0){
                $.ajax({
                    url: "{{ route('CekNOP') }}",
                    type: "post",
                    data: {
                        _token: `{{ csrf_token() }}`,
                        nop: nop
                    },
                    dataType: "JSON",
                    success: function(result){                        
                        $('#alamat').val(result.jalan_op);
                        $('#blok_kav_no').val(result.blok_kav_no);
                        $('#rt_op').val(result.rt_op);
                        $('#rw_op').val(result.rw_op);
                        $('#kelurahan').val(result.nm_kelurahan);
                        $('#kecamatan').val(result.nm_kecamatan);
                        $('#luastanah').val(result.total_luas_bumi);
                        $('#luasbng').val(result.total_luas_bng);
                        $('#njoptanah').val(format_ribuan(result.njop_bumi));
                        $('#njopbng').val(format_ribuan(result.njop_bng));

                        let njop = Number(result.njop_bumi) + Number(result.njop_bng);
                        $('#njoptotal').val(format_ribuan(njop));

                    }
                })

                $.ajax({
                    url: "{{ route('CekPBB') }}",
                    type: "post",
                    data: {
                        _token: `{{ csrf_token() }}`,
                        nop: nop
                    },
                    success: function(data){
                        $('#data-history-pbb').html(data);
                        $('.riwayat-pbb').show();
                    }
                })

                $.ajax({
                    url: "{{ route('cekTunggakanPBB') }}",
                    type: "post",
                    data: {
                        _token: `{{ csrf_token() }}`,
                        nop: nop
                    },
                    dataType: "json",
                    success: function(rs){
                        if(rs.tunggakan > 0){
                            $('#notif-tunggakan').show();
                            $('#next1-btn').prop('disabled', true); 
                        }else {
                            $('#notif-tunggakan').hide();
                            $('#next1-btn').prop('disabled', false); 
                        }
                    }
                })
            }
        });

        $("#CheckMulitpleNOP").on('click', function(){
            let isChecked = $(this).prop("checked");
            let npop = $('#npop').val().replace(/[^\d]/g, '');
            let diskon = $('#pengurangan').val();
            let npopkp;
            var bphtb;
            let bphtb_dibayar;


            if(isChecked){
                $('#npoptkp').val(0);
                npopkp = npop - 0;
        
                $('#npopkp').val(format_ribuan(npopkp));

                if(npopkp < 0){
                    npopkp = 0;
                }

                bphtb = npopkp * 0.05;
                bphtb_dibayar = bphtb - (bphtb * (parseInt(diskon)/100));
            }else {
                let npoptkp = 120000000;
                $('#npoptkp').val(npoptkp);
                npopkp = Number(npop) - Number(npoptkp);

                $('#npopkp').val(format_ribuan(npopkp));

                if(npopkp < 0){
                    npopkp = 0;
                }

                bphtb = Number(npopkp) * 0.05;
                bphtb_dibayar = Number(bphtb) - (Number(bphtb) * (Number(diskon)/100));
            }

            // $('#npopkp').val(format_ribuan(npopkp));
            $('#bphtb').val(format_ribuan(bphtb));
            $('#bphtb_dibayar').val(format_ribuan(bphtb_dibayar));
        })

        function transaksiNop()
        {
            let tahun = $('#tahun').val();
            let jns_perolehan = $('#jns_perolehan').val();
            let njop = $('#njoptotal').val().replace(/[^\d]/g, '');
            let hargaTrx = $('#hargatransaksi').val().replace(/[^\d]/g, '');
            let npop = $('#npop').val().replace(/[^\d]/g, '');
            let npoptkp=$('#npoptkp').val().replace(/[^\d]/g, '');
            let diskon = $('#pengurangan').val();
            let npopkp;
            let bphtb;
            let bphtb_dibayar;

            if(njop > hargaTrx){
                $('#npop').val(format_ribuan(njop));
                npopkp = Number(npop) - Number(npoptkp);
            }else {                
                $('#npop').val(format_ribuan(hargaTrx));
                npopkp = Number(npop) - Number(npoptkp);
            }

            if(npopkp < 0){
                npopkp = 0;
            }

            bphtb = Number(npopkp) * 0.05;
            bphtb_dibayar = Number(bphtb) - (Number(bphtb) * (Number(diskon)/100));

            $('#npopkp').val(format_ribuan(npopkp));
            $('#bphtb').val(format_ribuan(bphtb));
            $('#bphtb_dibayar').val(format_ribuan(bphtb_dibayar));
        }


        $('#hargatransaksi').on('keyup', function(){
            let hargaTrx = $(this).val();
            let njopTotal = $('#njoptotal').val();
            let npoptkp = $('#npoptkp').val();
            let diskon = $('#pengurangan').val();

            let njopNonFormating = njopTotal.replace(/[^\d]/g, '');
            let hargaNonFormating = hargaTrx.replace(/[^\d]/g, '');
            let npoptkpNonFormating = npoptkp.replace(/[^\d]/g, '');

            if(Number(njopNonFormating) > Number(hargaNonFormating)){
                $('#npop').val(format_ribuan(njopNonFormating));

                let npopkp = njopNonFormating - npoptkpNonFormating;
                let bphtb = (njopNonFormating - npoptkpNonFormating) * 0.05;

                if(npopkp < 0){
                    npopkp = 0;
                }

                if(bphtb < 0){
                    bphtb = 0;
                }
                
                let bphtb_dibayar = Number(bphtb) - (Number(bphtb) * (Number(diskon)/100));

                $('#npopkp').val(format_ribuan(npopkp));
                $('#bphtb').val(format_ribuan(bphtb));
                $('#bphtb_dibayar').val(format_ribuan(bphtb_dibayar));

            }else {
                $('#npop').val(format_ribuan(hargaNonFormating));
                let npopkp = hargaNonFormating - npoptkpNonFormating;
                let bphtb =(hargaNonFormating - npoptkpNonFormating) * 0.05;

                if(npopkp < 0){
                    npopkp = 0;
                }

                if(bphtb < 0){
                    bphtb = 0;
                }
                
                let bphtb_dibayar = Number(bphtb) - (Number(bphtb) * (Number(diskon)/100));

                $('#npopkp').val(format_ribuan(npopkp));
                $('#bphtb').val(format_ribuan(bphtb));
                $('#bphtb_dibayar').val(format_ribuan(bphtb_dibayar));
            }
        })

        function format_ribuan(bilangan)
        {
            // var bilangan = 23456789;
                
            var	number_string = bilangan.toString(),
                sisa 	= number_string.length % 3,
                rupiah 	= number_string.substr(0, sisa),
                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            return rupiah;
        }

        function lampiranView(bookId, idMstLampiran)
        {
            window.open("{{ url('sspd/lampiran') }}/"+bookId+"/"+idMstLampiran, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,fullscreen=no,top=100,left=500,width=800,height=800");
        }

        $('#btnTransaksiEdit').on('click', function(event){
            event.preventDefault();

            // const confirmed = window.confirm('Apakah anda yakin ??');
            // if(confirmed){
            //     $('#formTransaksiEdit').submit();
            // }else {
            //     return false;
            // }

            Swal.fire({
                title: "Apakah anda yakin ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
            }).then((result) => {
            if (result.isConfirmed) {
                $('#formTransaksiKB').submit();   
            }
            });
        })
    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
    </body>

    </html>