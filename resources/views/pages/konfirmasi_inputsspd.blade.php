<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $data['title'] }} | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="./assets/vendor/icon-set/style.css">
    <link rel="stylesheet" href="./assets/vendor/select2/dist/css/select2.min.css">

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
        <div class="row justify-content-sm-center text-center py-2">
          <div class="col-sm-7 col-md-5">
            <img class="img-fluid mb-3" src="{{ asset('assets/svg/illustrations/hi-five.svg') }}" alt="Image Description" style="max-width: 15rem;">

                <div class="mb-4">
                    <h2>Successful!</h2>
                    <p><span class="font-weight-bold text-dark">Transaksi SSPD berhasil dibuat.</p>
                </div>

                <div class="d-flex justify-content-center">
                    <a class="btn btn-outline-secondary mr-3" href="{{ route('sspd.index') }}">
                        <i class="tio-chevron-left ml-1"></i> Kembali ke Daftar SSPD
                    </a>

                    <input type="hidden" value="{{ $data['kd_billing'] }}" id="kd_billing">
                    <button type="button" class="btn btn-outline-primary" id="btn-cetak1234" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="tio-print mr-1"></i> Cetak Bukti Transaksi
                  </button>
                </div>
          </div>
        </div>
        <!-- End Row -->
      </div>
      <!-- End Content -->

      <!-- Footer -->
        <x-footer></x-footer>
      <!-- End Footer -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Bukti Transaksi</h5>
            <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
              <i class="tio-clear tio-lg"></i>
            </button>
          </div>
          <div class="modal-body">
            <!-- Card -->
            <div class="card">
              <div class="mr-1 mt-2 mb-2">
                <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                  <!-- Unfold -->
                  <div class="hs-unfold mr-1">
                    <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
                      data-hs-unfold-options='{
                        "target": "#usersExportDropdown",
                        "type": "css-animation"
                      }'>
                      <i class="tio-download-to mr-1"></i> Action
                    </a>

                    <div id="usersExportDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
                      <a id="export-print" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/illustrations/print.svg" alt="Image Description">
                        Print
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

              <!-- Table -->
              <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-sm table-borderless table-nowrap table-align-middle card-table"
                      data-hs-datatables-options='{
                        "columnDefs": [{
                            "targets": [0, 1],
                            "orderable": false
                          }],
                        "order": [],
                        "isResponsive": false,
                        "isShowPaging": false
                      }' width="100%">
                  <thead class="thead-light">
                    <tr>
                      <td style="background-color: #FFF;"></td>
                      <td class="text-right" style="background-color: #FFF;"></td>
                    </tr>
                  </thead>

                  <tbody>
                    <tr><td style="background-color: #FFF;"></td><td></td></tr>
                    <tr>
                      <td width="25%">No. Pesanan </td>
                      <td width="75%">{{ $data['data_transaksi']->kd_booking }}</td>
                    </tr>
                    <tr>
                      <td>NOP </td>
                      <td>{{ $data['data_transaksi']->nop }}</td>
                    </tr>
                    <tr>
                      <td>Alamat OP </td>
                      <td>{{ $data['data_transaksi']->alamat_op }}</td>
                    </tr>
                    <tr>
                      <td>Nama Pembeli </td>
                      <td>{{ $data['data_transaksi']->nm_pembeli }}</td>
                    </tr>
                    <tr>
                      <td>NIK Pembeli </td>
                      <td>{{ $data['data_transaksi']->no_identitas_pembeli }}</td>
                    </tr>
                    <tr>
                      <td>Alamat Pembeli </td>
                      <td>{{ $data['data_transaksi']->alamat_pembeli }}</td>
                    </tr>
                    <tr>
                      <td>BPHTB Terutang </td>
                      <td>Rp {{ number_format($data['data_transaksi']->bphtb_yg_harus_dibayar, 0, ',', '.') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- End Table -->

            </div>
            <!-- End Card -->


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          </div>
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

    <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/vendor/datatables.net.extensions/select/select.min.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./assets/vendor/pdfmake/build/pdfmake.min.js"></script>
    <script src="./assets/vendor/pdfmake/build/vfs_fonts.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>


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

        
        // INITIALIZATION OF DATATABLES
        // =======================================================
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'pdfHtml5',
              className: 'd-none',
              title: 'Tanda Terima Transaksi',
              orientation: 'portrait',
              pageSize: 'A4',
              customize: function (doc) {
                // doc.content[1].table.widths = 
                //     Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.content[1].table.widths = 
                    Array(doc.content[1].table.body[0].length + 1).fillColor = 'white';
                doc.defaultStyle.fontSize = 11;
                doc.content[1].table.widths = [120, '*'];
                doc.pageMargins = [60, 30, 30, 30];
              }
            },
            {
              extend: 'print',
              className: 'd-none'
            },
          ],
          language: {
            zeroRecords: '<div class="text-center p-4">' +
                '<img class="mb-3" src="./assets/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                '<p class="mb-0">No data to show</p>' +
                '</div>'
          }
        });

        $('#export-pdfTest').click(function() {
          datatable.button('.buttons-pdf').trigger()
        });

        $('#export-printTest').click(function() {
          datatable.button('.buttons-print').trigger()
        });

      });

      $('#export-pdf').on('click', function(){
        let kd_billing = $('#kd_billing').val();
        window.open('{{ url("/bukti-transaksi") }}/pdf/'+kd_billing, 'buktiTransaksi', 'width=800,height=600,resizable=yes');
      })

      $('#export-print').on('click', function(){
        let kd_billing = $('#kd_billing').val();

        $('#staticBackdrop').modal('hide');
        window.open('{{ url("/bukti-transaksi") }}/print/'+kd_billing, 'buktiTransaksi', 'top=100,left=500,width=800,height=600,resizable=yes,toolbar=no');
      })
    </script>

    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
  </body>
</html>
