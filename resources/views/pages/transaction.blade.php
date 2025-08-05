    <!-- ===== HEADER ======= -->
    @extends('layout_user.header')

    @section('title', 'Manajemen Transaksi')
    <!-- ===== END HEADER ==== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->
    @extends('layout_user.left_navbar')
    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
             <!-- Page Header -->
             <div class="page-header mt-10">
                <div class="row align-items-center mb-3">
                    <div class="col-sm">
                        <h1 class="page-header-title">Manajemen Transaksi</h1>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->
    
            <!-- Card -->
            <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search orders" aria-label="Search orders">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                            <!-- Datatable Info -->
                            <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
                                <div class="d-flex align-items-center">
                                <span class="font-size-sm mr-3">
                                    <span id="datatableCounter">0</span>
                                    Selected
                                </span>
                                <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                    <i class="tio-delete-outlined"></i> Delete
                                </a>
                                </div>
                            </div>
                            <!-- End Datatable Info -->

                            <!-- Unfold -->
                            <div class="hs-unfold mr-2">
                                <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
                                data-hs-unfold-options='{
                                    "target": "#usersExportDropdown",
                                    "type": "css-animation"
                                }'>
                                <i class="tio-download-to mr-1"></i> Export
                                </a>

                                <div id="usersExportDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/illustrations/copy.svg" alt="Image Description">
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/illustrations/print.svg" alt="Image Description">
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/brands/excel.svg" alt="Image Description">
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/brands/pdf.svg" alt="Image Description">
                                    PDF
                                </a>
                                </div>
                            </div>
                            <!-- End Unfold -->
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table" style="width: 100%"
                    data-hs-datatables-options='{
                        "columnDefs": [{
                            "targets": [0],
                            "orderable": false
                        }],
                        "order": [],
                        "info": {
                        "totalQty": "#datatableWithPaginationInfoTotalQty"
                        },
                        "search": "#datatableSearch",
                        "entries": "#datatableEntries",
                        "pageLength": 12,
                        "isResponsive": false,
                        "isShowPaging": false,
                        "pagination": "datatablePagination"
                    }'>
                    <thead class="thead-light">
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">NOP</th>
                            <th rowspan="2">Kd Billing</th>
                            <th rowspan="2">NO. AKTA</th>
                            <th rowspan="2">NAMA PENJUAL<br>NPWP</th>
                            <th rowspan="2">NTPN</th>
                            <th rowspan="2">NAMA PEMBELI<br>NPWP</th>
                            <th rowspan="2">NILAI TRANSAKSI</th>
                            <th rowspan="2">NIB</th>
                            <th rowspan="2">BPHTB DIBAYAR</th>
                            <th rowspan="2">STATUS PEMBAYARAN</th>
                            <th colspan="3">STATUS VALIDASI DISPENDA</th>
                            <th rowspan="2">KET.</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th>AR</th>
                            <th>Kasi</th>
                            <th>Kabid</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nop }}</td>
                                <td>{{ $row->kd_booking }}</td>
                                <td>{{ $row->no_akta }}</td>
                                <td>{{ $row->nm_penjual }} <br> {{ $row->npwp_penjual }}</td>
                                <td>{{ $row->ntpn }}</td>
                                <td>{{ $row->nm_pembeli }} <br> {{ $row->npwp_pembeli }}</td>
                                <td style='text-align: right;'>{{ number_format($row->harga_transaksi) }}</td>
                                <td>{{ $row->nib }}</td>
                                <td style='text-align: right;'>{{ number_format($row->bphtb_yg_harus_dibayar) }}</td>
                                <td>
                                    @if ($row->status_bayar == "0")
                                        <span class="badge badge-soft-warning">
                                            <span class="legend-indicator bg-warning"></span>Pending
                                        </span>
                                    @else
                                        <span class="badge badge-soft-success">
                                            <span class="legend-indicator bg-success"></span>Paid
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status_validasi == "0")
                                        <span class="badge badge-soft-warning">
                                            <span class="legend-indicator bg-warning"></span>Pending
                                        </span>
                                    @else
                                        <span class="badge badge-soft-success">
                                            <span class="legend-indicator bg-success"></span>Paid
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->validasi_kasi == "0")
                                        <span class="badge badge-soft-warning">
                                            <span class="legend-indicator bg-warning"></span>Pending
                                        </span>
                                    @else
                                        <span class="badge badge-soft-success">
                                            <span class="legend-indicator bg-success"></span>Paid
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->validasi_kabid == "0")
                                        <span class="badge badge-soft-warning">
                                            <span class="legend-indicator bg-warning"></span>Pending
                                        </span>
                                    @else
                                        <span class="badge badge-soft-success">
                                            <span class="legend-indicator bg-success"></span>Paid
                                        </span>
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    <!-- Select -->
                                    <select class="custom-select custom-select-sm">
                                        <option selected="">-</option>
                                        <option value="1">Cetak Bukti Transaksi</option>
                                        <option value="2">Update Transaksi</option>
                                        <option value="3">Edit SSPD</option>
                                        <option value="3">Cetak SSPD</option>
                                        <option value="3">Hapus SSPD</option>
                                        <option value="3">Upload SKNJOP</option>
                                    </select>
                                    <!-- End Select -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                    <span class="mr-2">Showing:</span>

                    <!-- Select -->
                    <select id="datatableEntries" class="js-select2-custom"
                            data-hs-select2-options='{
                                "minimumResultsForSearch": "Infinity",
                                "customClass": "custom-select custom-select-sm custom-select-borderless",
                                "dropdownAutoWidth": true,
                                "width": true
                            }'>
                        <option value="12" selected>12</option>
                        <option value="14">14</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                    </select>
                    <!-- End Select -->

                    <span class="text-secondary mr-2">of</span>

                    <!-- Pagination Quantity -->
                    <span id="datatableWithPaginationInfoTotalQty"></span>
                    </div>
                </div>

                <div class="col-sm-auto">
                    <div class="d-flex justify-content-center justify-content-sm-end">
                    <!-- Pagination -->
                    <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                    </div>
                </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
            </div>
            <!-- End Card -->
            
        </div>
        <!-- End Content -->

        <!-- Footer -->
        @extends('layout_user.footer')
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
    <script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net.extensions/select/select.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-add-field/dist/hs-add-field.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <!-- JS Front -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
        // =======================================================


            // BUILDER TOGGLE INVOKER
            // =======================================================
            $('.js-navbar-vertical-aside-toggle-invoker').click(function () {
            $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
            });

            

            
            // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
            // =======================================================
            var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

            
            // INITIALIZATION OF TOOLTIP IN NAVBAR VERTICAL MENU
            // =======================================================
            $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

            $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
            if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                return false;
            }
            });

            
            // INITIALIZATION OF UNFOLD
            // =======================================================
            $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
            });

            
            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            $('.js-form-search').each(function () {
            new HSFormSearch($(this)).init()
            });


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            $('.js-nav-scroller').each(function () {
            new HsNavScroller($(this)).init()
            });

            
            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            
            // INITIALIZATION OF DATATABLES
            // =======================================================
            var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            dom: 'Bfrtip',
            buttons: [
                {
                extend: 'copy',
                className: 'd-none'
                },
                {
                extend: 'excel',
                className: 'd-none'
                },
                {
                extend: 'csv',
                className: 'd-none'
                },
                {
                extend: 'pdf',
                className: 'd-none'
                },
                {
                extend: 'print',
                className: 'd-none'
                },
            ],
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                checkAll: '#datatableCheckAll',
                counter: '#datatableCounter',
                counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src="./assets/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
            }
            });

            $('#export-copy').click(function() {
            datatable.button('.buttons-copy').trigger()
            });

            $('#export-excel').click(function() {
            datatable.button('.buttons-excel').trigger()
            });

            $('#export-csv').click(function() {
            datatable.button('.buttons-csv').trigger()
            });

            $('#export-pdf').click(function() {
            datatable.button('.buttons-pdf').trigger()
            });

            $('#export-print').click(function() {
            datatable.button('.buttons-print').trigger()
            });

            $('#datatableSearch').on('mouseup', function (e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function(){
                var newValue = $input.val();

                if (newValue == ""){
                // Gotcha
                datatable.search('').draw();
                }
            }, 1);
            });

            $('#toggleColumn_order').change(function (e) {
            datatable.columns(1).visible(e.target.checked)
            })

            $('#toggleColumn_date').change(function (e) {
            datatable.columns(2).visible(e.target.checked)
            })

            $('#toggleColumn_customer').change(function (e) {
            datatable.columns(3).visible(e.target.checked)
            })

            $('#toggleColumn_payment_status').change(function (e) {
            datatable.columns(4).visible(e.target.checked)
            })

            datatable.columns(5).visible(false)

            $('#toggleColumn_fulfillment_status').change(function (e) {
            datatable.columns(5).visible(e.target.checked)
            })

            $('#toggleColumn_payment_method').change(function (e) {
            datatable.columns(6).visible(e.target.checked)
            })

            $('#toggleColumn_total').change(function (e) {
            datatable.columns(7).visible(e.target.checked)
            })

            $('#toggleColumn_actions').change(function (e) {
            datatable.columns(8).visible(e.target.checked)
            })

            
            // INITIALIZATION OF TAGIFY
            // =======================================================
            $('.js-tagify').each(function () {
            var tagify = $.HSCore.components.HSTagify.init($(this));
            });
        });
    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
    </body>

    </html>