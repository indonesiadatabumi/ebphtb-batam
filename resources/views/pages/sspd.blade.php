<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $title }} | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="./assets/vendor/icon-set/style.css">
    <link rel="stylesheet" href="./assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="./assets/vendor/@yaireo/tagify/dist/tagify.css">
    

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="./assets/css/theme.min.css">
  </head>

  <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">
    
      <script src="./assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js"></script>
    
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
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-center mb-3">
            <div class="col-sm">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                  <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Kelola SSPD</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data SSPD</li>
                </ol>
              </nav>
              <h1 class="page-header-title">Data Transaksi SSPD  </h1>
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
                    <input id="datatableSearch" type="search" class="form-control" placeholder="Cari transaksi sspd" aria-label="Cari Transaksi">
                  </div>
                  <!-- End Search -->
                </form>
              </div>

              <div class="col-lg-6">
                <div class="d-sm-flex justify-content-sm-end align-items-sm-center">

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
                      <a id="export-print" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/illustrations/print.svg" alt="Image Description">
                        Print
                      </a>
                      <a id="export-excel" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/brands/excel.svg" alt="Image Description">
                        Excel
                      </a>
                    </div>
                  </div>
                  <!-- End Unfold -->

                  <a type="button" class="btn btn-primary btn-sm" href="{{ route('sspd.create') }}"><i class="tio-add-circle-outlined mr-1"></i>Input SSPD</a>
                </div>
              </div>
            </div>
            <!-- End Row -->
          </div>
          <!-- End Header -->
          @if(Session::has('success_edit'))
          <div class="alert alert-soft-success" role="alert">
            {{ Session::get('success_edit') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="tio-clear tio-lg"></i>
            </button>
          </div>
          @endif
          
          <!-- Table -->
          <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-hover table-borderless table-thead-bordered table-align-middle card-table" style="width: 100%"
                   data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 3, 5, 7],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 25,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
              <thead class="thead-light">
                <tr>
                  <th class="table-column-pr-0">NO</th>
                  <th>NOP</th>
                  <th>Tgl. Input</th>
                  <th width="12%">Kode Billing</th>
                  <th>Alamat OP</th>
                  <th>Jns. Perolehan</th>
                  <th>Nilai Pajak</th>
                  <th width="15%">&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                @foreach($data_transaksi as $d)
                <tr>
                  <td class="table-column-pr-0">{{ $loop->index + 1 }}</td>
                  <td>{{ $d['nop'] }}</td>
                  <td>{{ $d['tgl_rekam'] }}</td>
                  <td>
                    {{ $d['kd_booking'] }}
                  </td>
                  <td>{{ $d['alamat_op'] }}</td>
                  <td>{{ $d['nm_perolehan'] }}</td>
                  <td class="text-right">{{ number_format($d['bphtb_yg_harus_dibayar']) }}</td>
                  <td>
                    <!-- Select -->
                    <select class="custom-select custom-select-sm aksiData">
                      <option selected="0">Aksi </option>
                      <option value="1|{{ $d['kd_booking'] }}" {{ ($d['status_bayar'] == '1' ? 'disabled' : '') }}>Cetak Bukti Transaksi</option>
                      <option value="2|{{ $d['kd_booking'] }}">Cetak SSPD</option>
                      <option value="3|{{ $d['kd_booking'] }}" {{ ($d['status_bayar'] == '1' ? 'disabled' : '') }}>Ubah SSPD</option>
                      <option value="4|{{ $d['kd_booking'] }}" {{ ($d['status_bayar'] == '1' ? 'disabled' : '') }}>Hapus SSPD</option>
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
                    <option value="25" selected>25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
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
      <x-footer></x-footer>      
      <!-- End Footer -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- Modal -->
    <div class="modal fade delete-sspd-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="mySmallModalLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
              <i class="tio-clear tio-lg"></i>
            </button>
          </div>
          <div class="modal-body">
            Apakah anda yakin akan menghapus billing <span id="konf-bookid"></span> ?
          </div>
          <form method="post" action="{{ route('sspd:hapusbilling') }}">
            @csrf
            <div class="modal-footer">
              <input type="hidden" name="kd_billing" id="kd_billing">
              <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Hapus Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->


    <!-- JS Global Compulsory  -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="./assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside.min.js"></script>
    <script src="./assets/vendor/hs-unfold/dist/hs-unfold.min.js"></script>
    <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>
    <script src="./assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
    <script src="./assets/vendor/select2/dist/js/select2.full.min.js"></script>
    <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/vendor/datatables.net.extensions/select/select.min.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./assets/vendor/jszip/dist/jszip.min.js"></script>
    <script src="./assets/vendor/pdfmake/build/pdfmake.min.js"></script>
    <script src="./assets/vendor/pdfmake/build/vfs_fonts.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="./assets/vendor/@yaireo/tagify/dist/tagify.min.js"></script>
    
    <!-- JS Front -->
    <script src="./assets/js/theme.min.js"></script>

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
          // select: {
          //   style: 'multi',
          //   selector: 'td:first-child input[type="checkbox"]',
          //   classMap: {
          //     checkAll: '#datatableCheckAll',
          //     counter: '#datatableCounter',
          //     counterInfo: '#datatableCounterInfo'
          //   }
          // },
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

        // $('#toggleColumn_no').change(function (e) {
        //   datatable.columns(0).visible(e.target.checked)
        // })

        // $('#toggleColumn_order').change(function (e) {
        //   datatable.columns(1).visible(e.target.checked)
        // })

        // $('#toggleColumn_date').change(function (e) {
        //   datatable.columns(2).visible(e.target.checked)
        // })

        // $('#toggleColumn_customer').change(function (e) {
        //   datatable.columns(3).visible(e.target.checked) 
        // })

        // $('#toggleColumn_payment_status').change(function (e) {
        //   datatable.columns(4).visible(e.target.checked)
        // })

        // datatable.columns(5).visible(false)

        // $('#toggleColumn_fulfillment_status').change(function (e) {
        //   datatable.columns(5).visible(e.target.checked)
        // })

        // $('#toggleColumn_payment_method').change(function (e) {
        //   datatable.columns(6).visible(e.target.checked)
        // })

        // $('#toggleColumn_total').change(function (e) {
        //   datatable.columns(7).visible(e.target.checked)
        // })

        // $('#toggleColumn_actions').change(function (e) {
        //   datatable.columns(8).visible(e.target.checked)
        // })

        
        // INITIALIZATION OF TAGIFY
        // =======================================================
        $('.js-tagify').each(function () {
          var tagify = $.HSCore.components.HSTagify.init($(this));
        });
      });

      $('.aksiData').on('change', function(){
        let val = $(this).val();
        const options = val.split("|");

        if(options[0] === '1'){ // print pdf
          window.open('{{ url("/bukti-transaksi") }}/pdf/'+options[1], 'buktiTransaksi', 'width=800,height=600,resizable=yes');
        }else if(options[0] === '2') { // print pdf sspd
          window.open('{{ url("/print-sspd") }}/'+options[1], 'sspdTransaksi', 'width=900,height=700,resizable=no,left=250,top=20');
        }else if(options[0] === '3') { // edit sspd
          var bil = '90902190';
          // window.open('{{ route("sspd.edit", ["sspd" => 'bil']) }}', "_self");
          window.open('{{ url("/sspd") }}/'+options[1]+'/edit', '_self');
        }else if(options[0] === '4'){
          $('#konf-bookid').text(options[1]);
          $('#kd_billing').val(options[1]);
          $('.delete-sspd-modal').modal('show');
        }else {
          alert(options[0]);
        }
      })
    </script>

    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
  </body>
</html>
