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
                                                <option value="{{ $t->tahun }}" @if($t->tahun == date('Y')) selected @endif>{{ $t->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Referensi Kode Billing</label>

                                        <div class="col-sm-9">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                data-hs-select2-options='{
                                                    "placeholder": "Pilih Billing Referensi",
                                                    "searchInputPlaceholder": "Cari Billing Refrensi"
                                                    }'>
                                                <option label="empty"></option>
                                                @foreach($referensikb as $rkb)
                                                <option value="{{ $rkb->kd_booking }}">{{ $rkb->nm_pembeli }}, {{ $rkb->nop }}, {{ $rkb->kd_booking }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jenis Perolehan</label>

                                        <div class="col-sm-9">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                data-hs-select2-options='{
                                                    "placeholder": "Pilih Jenis Perolehan",
                                                    "searchInputPlaceholder": "Cari jenis perolehan"
                                                    }' name="jns_perolehan" id="jns_perolehan">
                                                <option label="empty"></option>
                                                @foreach($jnsperolehan as $jp)
                                                <option value="{{ $jp->kd_perolehan }}">{{ $jp->kd_perolehan }}. {{ $jp->nm_perolehan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Objek Pajak</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="js-masked-input form-control" placeholder="Nomor Objek Pajak"
                                                data-hs-mask-options='{
                                            "template": "00.00.000.000.000.0000.0"
                                            }' name="nop" id="nop">
                                        </div>
                                    </div>
                                    <div class="row form-group riwayat-pbb" style="display: none;">
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
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                data-hs-select2-options='{
                                                    "placeholder": "Pilih Legalitas",
                                                    "searchInputPlaceholder": "Search a member"
                                                    }' name="legalitas_hak"  required>
                                                <option label="empty"></option>
                                                @foreach($jnsSuratTanah as $st)
                                                <option value="{{ $st->kd_hak }}">{{ $st->nm_hak }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Sertifikat</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="no_sertifikat" placeholder="No sertifikat" aria-label="no sertifikat" required>
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
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="js-masked-input form-control" name="hargatransaksi" id="hargatransaksi" placeholder="Harga Transaksi" aria-label="Harga Transaksi"
                                                data-hs-mask-options='{
                                                    "template": "#.##0",
                                                    "selectOnFocus": true,
                                                    "reverse": true
                                                }' required>
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
                                                <input type="text" class="js-masked-input form-control" name="npop" id="npop" placeholder="NPOP"
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
                                                <input type="text" class="js-masked-input form-control col-sm-4" name="npoptkp" id="npoptkp" placeholder="NPOPTKP" aria-label="npoptkp" value="120000000"
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
                                                <input type="text" class="js-masked-input form-control"  name="npopkp" id="npopkp" placeholder="Npopkp" aria-label="npopkp"
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
                                                <input type="text" class="js-masked-input form-control" name="bphtb" id="bphtb" placeholder="BPHTB Terutang" aria-label="bphtb"
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
                                            <input type="number" class="form-control" name="pengurangan" id="pengurangan" placeholder="Pengurangan" aria-label="pengurangan" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">BPHTB yang Harus Dibayar </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" name="bphtb_dibayar" id="bphtb_dibayar" placeholder="Bphtb yg harus dibayar" aria-label="bphtb_dibayar" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jumlah Setoran Berdasarkan </label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <!-- Checkbox -->
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" class="custom-control-input" name="jns_setoran" value="1" checked>
                                                    <label class="custom-control-label" for="customRadio1">Penghitungan Wajib Pajak</label>
                                                </div>
                                                <!-- End Checkbox -->
                                            </div>

                                            <div class="form-group">
                                                <!-- Checkbox -->
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" class="custom-control-input" name="jns_setoran" value="2">
                                                    <label class="custom-control-label" for="customRadio2">SKPDB KB</label>
                                                </div>
                                                <!-- End Checkbox -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Dokumen Pendukung Pemesanan Rumah/ PPJB/ KJB antara Developer dan Pembeli </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="dokPendukung" id="dokPendukung" placeholder="Nomor dokumen pendukung" aria-label="dokPendukung">
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

                                                <input type="text" class="flatpickr-custom-form-control form-control" id="projectDeadlineFlatpickrNewProjectLabel" placeholder="Select dates" data-input>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Keterangan </label>
                                        <div class="col-sm-9">
                                            <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Status Rumah/ Bangunan </label>
                                        <div class="col-sm-5">
                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio1" class="custom-control-input" name="status_bgn" value="1" checked>
                                                    <label class="custom-control-label" for="customInlineRadio1">1. Baru</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->

                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio2" class="custom-control-input indeterminate-checkbox" value="2" name="status_bgn">
                                                    <label class="custom-control-label" for="customInlineRadio2">2. Bekas</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->

                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio3" class="custom-control-input indeterminate-checkbox" value="3" name="status_bgn">
                                                    <label class="custom-control-label" for="customInlineRadio3">3. Tidak ada bangunan/ rumah</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->
                                             <div id="test"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Body -->

