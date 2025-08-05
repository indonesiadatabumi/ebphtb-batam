@php
use App\Services\EbphtbServices;
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $title }} | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://batam.go.id/wp-content/uploads/2018/03/cropped-home-32x32.png" sizes="32x32" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
  </head>

  <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">
    
      <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js') }}"></script>
    
    <!-- ========== HEADER ========== -->
    <x-header></x-header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->
      <x-navbar></x-navbar>
    <!-- End Navbar Vertical -->    
    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main">
      <!-- Content -->
      <div class="content container-fluid">
        <div class="page-header">
          <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title">Monitoring Transaksi BPHTB </h1>
            </div>

          </div>
        </div>

        <!-- Card -->
        <div class="card">
          <!-- Body -->
          <div class="card-body">
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
                    <input id="datatableSearch" type="search" class="form-control" placeholder="Pencarian Transaksi" aria-label="Pencarian Transaksi">
                  </div>
                  <!-- End Search -->
                </form>
              </div>
              
              <div class="col-auto">
                <div class="row align-items-sm-center">
                  <div class="col-sm-auto">
                    <div class="d-flex align-items-center mr-2">
                      <span class="text-secondary mr-2">Tampilkan data bulan: </span>

                      <!-- Select -->
                      <select class="js-select2-custom js-datatable-filter custom-select-sm" size="1" style="opacity: 0;"
                              data-target-column-index="4"
                              data-hs-select2-options='{
                                "minimumResultsForSearch": "Infinity",
                                "customClass": "custom-select custom-select-sm custom-select-borderless",
                                "dropdownAutoWidth": true,
                                "width": true
                              }'>
                            <option value="">All</option>
                        @foreach(Carbon\CarbonPeriod::create(now()->startOfYear(), '1 month', now()->endOfYear()) as $date)
                            <option value="{{ $date->month }}" {{ ($date->month == date('n') ? 'selected' : '') }}>{{ $date->month }}</option>
                        @endforeach
                      </select>
                      <!-- End Select -->
                    </div>
                  </div>
                  <div class="col-sm-auto">
                    <div class="d-flex align-items-center mr-2">
                      <span class="text-secondary mr-2">Tahun:</span>

                      <!-- Select -->
                      <select class="js-select2-custom js-datatable-filter custom-select-sm" size="1" style="opacity: 0;"
                              data-target-column-index="3"
                              data-hs-select2-options='{
                                "minimumResultsForSearch": "Infinity",
                                "customClass": "custom-select custom-select-sm custom-select-borderless",
                                "dropdownAutoWidth": true,
                                "width": true
                              }'>
                        <option value="">All</option>
                        @foreach($tahun as $t)
                          <option value="{{ $t->tahun }}" {{ ($t->tahun == date('Y') ? 'selected' : '') }}>{{ $t->tahun }}</option>
                        @endforeach
                      </select>
                      <!-- End Select -->
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- End Row -->
          </div>
          <!-- End Body -->

          <!-- Table -->
          <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-lg table-bordered table-thead-bordered table-hover table-align-middle card-table"
                   data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0,1,2,3,4,5,6,7,8,9,10,11,12],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
              <thead class="thead-light">
                <tr>
                  <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center pb-1">NOP</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">Tgl. Input</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">Kd. Billing</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">Tahun</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">bulan</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">Nama Penjual</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">Nama Pembeli</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">Nilai Transaksi</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1">BPHTB dibayar</th>
                  <th rowspan="2" style="vertical-align: middle;" class="text-center pb-1 pr-1 pl-1">Status <br/>Pembayaran</th>
                  <th colspan="3" class="text-center pt-1 pb-1">Status Validasi</th>
                </tr>
                <tr>
                  <td class="text-center pb-1 pt-1">AR</td>
                  <td class="text-center pb-1 pt-1">Kasi</td>
                  <td class="text-center pb-1 pt-1">Kabid</td>
                </tr>
              </thead>

              <tbody>
                @foreach($data as $d)
                
                <tr>
                  <td class="pr-0">
                    <span class="h5 text-hover-primary">{{ EbphtbServices::format_nop($d->nop) }}</span>
                  </td>
                  <td class="pr-2">{{ $d->tgl_rekam }}</td>
                  <td>{{ $d->kd_booking }}</td>
                  <td>{{ $d->rekam_year }}</td>
                  <td>{{ $d->rekam_month }}</td>
                  <td class="pl-2">{{ $d->nm_penjual }}</td>
                  <td class="pl-2">{{ $d->nm_pembeli }}</tds>
                  <td class="text-right pr-2">{{ number_format($d->harga_transaksi, 0, ',','.') }}</td>
                  <td class="text-right pr-2">{{ number_format($d->bphtb_yg_harus_dibayar, 0, ',','.') }}</td>
                  <td class="text-center"><span class="legend-indicator {{ ($d->status_bayar == '1' ? 'bg-success' : 'bg-danger') }}"></span></td>
                  <td class="text-center"><span class="legend-indicator {{ ($d->status_validasi == '1' ? 'bg-success' : 'bg-danger') }}"></span></td>
                  <td class="text-center"><span class="legend-indicator {{ ($d->validasi_kasi == '1' ? 'bg-success' : 'bg-danger') }}"></span></td>
                  <td class="text-center"><span class="legend-indicator {{ ($d->validasi_kabid == '1' ? 'bg-success' : 'bg-danger') }}"></span></td>
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
                    <option value="10">10</option>
                    <option value="15" selected>15</option>
                    <option value="20">20</option>
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

        <div class="ml-3 mt-4">
          <span class="legend-indicator bg-success"></span> : completed <br />
          <span class="legend-indicator bg-danger"></span> : not completed
        </div>
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
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net.extensions/select/select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>

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

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // INITIALIZATION OF DATERANGEPICKER
        // =======================================================
        var startDate = null,
        endDate = null;

        // INITIALIZATION OF DATERANGEPICKER
        // =======================================================
        $('.js-daterangepicker').each(function () {
          var d = $.HSCore.components.HSDaterangepicker.init($(this));
        });

        $('.js-daterangepicker').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

          startDate = moment(picker.startDate.format('DD/MM/YYYY'));
          endDate = moment(picker.endDate.format('DD/MM/YYYY'));

          datatable.draw();
        });

        $('.js-daterangepicker').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');

          startDate = null;
          endDate = null;

          datatable.draw();
        });

        $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
            if (!startDate || !endDate) return true;

            let compareDate = moment(moment(data[4]).format('DD/MM/YYYY'));

            return compareDate.isBetween(startDate, endDate);
          }
        );

        // INITIALIZATION OF DATATABLES
        // =======================================================
        let d = new Date();
        let month = d.getMonth(); // array month dari 0
        let currentMonth = month + 1;
        let year = d.getFullYear();

        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
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
                '<p class="mb-0">No data to show</p>' +
                '</div>'
          },
          initComplete: function(){
            this.api().column(3).search(year).draw();
            this.api().column(4).search(month).draw();
          }
        });

        $('.js-datatable-filter').on('change', function() {
          var $this = $(this),
            elVal = $this.val(),
            targetColumnIndex = $this.data('target-column-index');

          datatable.column(targetColumnIndex).search(elVal).draw();
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

        datatable.columns(3).visible(false)
        datatable.columns(4).visible(false)
        /*
        $('#toggleColumn_name').change(function (e) {
          datatable.columns(1).visible(e.target.checked)
        })

        $('#toggleColumn_email').change(function (e) {
          datatable.columns(2).visible(e.target.checked)
        })

        datatable.columns(3).visible(false)

        $('#toggleColumn_phone').change(function (e) {
          datatable.columns(3).visible(e.target.checked)
        })

        $('#toggleColumn_country').change(function (e) {
          datatable.columns(4).visible(e.target.checked)
        })

        datatable.columns(5).visible(false)

        $('#toggleColumn_account_status').change(function (e) {
          datatable.columns(5).visible(e.target.checked)
        })

        $('#toggleColumn_orders').change(function (e) {
          datatable.columns(6).visible(e.target.checked)
        })

        $('#toggleColumn_total_spent').change(function (e) {
          datatable.columns(7).visible(e.target.checked)
        })

        datatable.columns(8).visible(false)

        $('#toggleColumn_last_activity').change(function (e) {
          datatable.columns(8).visible(e.target.checked)
        })
        */

      });
    </script>

    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
  </body>
</html>
