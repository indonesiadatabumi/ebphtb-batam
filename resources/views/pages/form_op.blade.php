                            <!-- Card -->
                            <div id="addUserStepProfile" class="card card-lg active">
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
                                                    }'>
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
                                                    }'>
                                                <option label="empty"></option>
                                                @foreach($jns_perolehan as $jp)
                                                <option value="{{ $jp->kd_perolehan }}">{{ $jp->kd_perolehan }}. {{ $jp->nm_perolehan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Objek Pajak</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="js-masked-input form-control" placeholder="xx.xx.xxx.xxx.xxx.xxxx.x"
                                                data-hs-mask-options='{
                                            "template": "00.00.000.000.000.0000.0"
                                            }'>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Legalitas Kepemilikan Tanah</label>

                                        <div class="col-sm-9">
                                            <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                                data-hs-select2-options='{
                                                    "placeholder": "Pilih Legalitas",
                                                    "searchInputPlaceholder": "Search a member"
                                                    }'>
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
                                            <input type="text" class="form-control" name="no_sertifikat" placeholder="No sertifikat" aria-label="no sertifikat">
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
                                            <input type="text" class="form-control" name="blok_kav" id="blok_kav" placeholder="blok/ kav/ No" aria-label="blok_kav">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">RT / RW</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rt" id="rt" placeholder="RT" aria-label="rt">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="rw" id="rw" placeholder="RW" aria-label="rw">
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
                                            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" aria-label="kota">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Kode Pos </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kode pos" aria-label="kodepos">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Luas Tanah </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="luastanah" id="luastanah" placeholder="Luas tanah" aria-label="luastanah">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NJOP Tanah </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="njoptanah" id="njoptanah" placeholder="Njop tanah" aria-label="njoptanah">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Luas Bangunan </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="luasbng" id="luasbng" placeholder="Luas bng" aria-label="luasbng">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NJOP Bangunan </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="njopbng" id="njopbng" placeholder="Njop bng" aria-label="njopbng">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NJOP Total </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="njoptotal" id="njoptotal" placeholder="Njop total" aria-label="njoptotal">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Harga Transakai </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="transaksi" id="transaksi" placeholder="Harga Transaksi" aria-label="Harga Transaksi">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPOP (Nilai Perolahan Objek Pajak) </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="npop" id="npop" placeholder="Npop" aria-label="npop">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPOPTKP (Nilai Perolehan Objek Pajak Tidak ) </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="npoptkp" id="npoptkp" placeholder="NPOPTKP" aria-label="npoptkp">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">NPOPKP (Nilai Perolehan Objek Kena Pajak ) </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="npopkp" id="npopkp" placeholder="Npopkp" aria-label="npopkp">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">BPHTB Terutang </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="bphtb" id="bphtb" placeholder="BPHTB Terutang" aria-label="BPHTB Terutang">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Pengurangan (%)</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="pengurangan" id="pengurangan" placeholder="Pengurangan" aria-label="pengurangan">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">BPHTB yang Harus Dibayar </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="bphtb_dibayar" id="bphtb_dibayar" placeholder="Bphtb yg harus dibayar" aria-label="bphtb_dibayar">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Jumlah Setoran Berdasarkan </label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <!-- Checkbox -->
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" class="custom-control-input" name="customRadio" checked>
                                                    <label class="custom-control-label" for="customRadio1">Penghitungan Wajib Pajak</label>
                                                </div>
                                                <!-- End Checkbox -->
                                            </div>

                                            <div class="form-group">
                                                <!-- Checkbox -->
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" class="custom-control-input" name="customRadio">
                                                    <label class="custom-control-label" for="customRadio2">SKPDB KB</label>
                                                </div>
                                                <!-- End Checkbox -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Nomor Dokumen Pendukung Pemesanan Rumah/ PPJB/ KJB antara Developer dan Pembeli </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="bphtb_dibayar" id="bphtb_dibayar" placeholder="Bphtb yg harus dibayar" aria-label="bphtb_dibayar">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Keterangan </label>
                                        <div class="col-sm-9">
                                            <textarea id="exampleFormControlTextarea1" class="form-control" placeholder="Textarea field" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Status Rumah/ Bangunan </label>
                                        <div class="col-sm-5">
                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio1" class="custom-control-input" name="status_bgn" checked>
                                                    <label class="custom-control-label" for="customInlineRadio1">Baru</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->

                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio2" class="custom-control-input indeterminate-checkbox" name="status_bgn">
                                                    <label class="custom-control-label" for="customInlineRadio2">Bekas</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->

                                            <!-- Form Check -->
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customInlineRadio3" class="custom-control-input indeterminate-checkbox" name="status_bgn">
                                                    <label class="custom-control-label" for="customInlineRadio3">Tidak ada bangunan/ rumah</label>
                                                </div>
                                            </div>
                                            <!-- End Form Check -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-primary"
                                        data-hs-step-form-next-options='{
                              "targetSelector": "#addUserStepBillingAddress"
                            }'>
                                        Next <i class="tio-chevron-right"></i>
                                    </button>
                                </div>
                                <!-- End Footer -->
                            </div>
                            <!-- End Card -->