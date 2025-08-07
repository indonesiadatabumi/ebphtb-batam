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
    <title>Verifikasi Kurang Bayar | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://batam.go.id/wp-content/uploads/2018/03/cropped-home-32x32.png" sizes="32x32" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/dataTables.bootstrap.min.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
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
        <div class="page-header">
          <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title">Verifikasi Kurang Bayar</h1>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="card">
          <!-- Body -->
          <div class="card-body">
            <form>
                <div class="row justify-content-between align-items-center">
                    <!-- Left Side: Search Type -->
                    <div class="col-lg-auto mb-3 mb-lg-0">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="mr-2" for="search-type">Pencarian:</label>
                            </div>
                            <div class="col-auto">
                                <select id="search-type" class="js-select2-custom custom-select custom-select-sm" style="width: 150px;"
                                        data-hs-select2-options='{
                                            "minimumResultsForSearch": "Infinity"
                                        }'>
                                    <option value="nop" selected>NOP</option>
                                    <option value="nama">Nama Pembeli</option>
                                    <option value="ketetapan">No. Ketetapan</option>
                                    <option value="billing">Kode Billing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End Left Side -->

                    <!-- Right Side: Search Input and Submit -->
                    <div class="col-lg-auto">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <input id="datatableSearch" type="text" class="form-control form-control-sm" style="width: 250px;" placeholder="Masukkan pencarian...">
                            </div>
                            <div class="col-auto">
                                <button type="button" id="search-button" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Side -->
                </div>
            </form>
          </div>
          <!-- End Body -->

          <!-- Table -->
          <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-lg table-bordered table-thead-bordered table-hover table-align-middle card-table">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>NOP</th>
                  <th>Kode Billing</th>
                  <th>No. Ketetapan</th>
                  <th>Tgl. Ketetapan</th>
                  <th>Tgl. Jatuh Tempo</th>
                  <th>Nama Pembeli</th>
                  <th>Jumlah KB</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Verifikasi Kasi Penagihan & Pemeriksaan</th>
                  <th class="text-center">Verifikasi Kasi Penilaian & Penetapan</th>
                  <th class="text-center">Verifikasi Kabid</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td colspan="13" class="text-center">Tidak ada data untuk ditampilkan</td>
                </tr>
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

    <!-- JS Front -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
      $(document).on('ready', function () {
        // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
        var sidebar = $('.js-navbar-vertical-aside').hsSideNav();
        
        // INITIALIZATION OF UNFOLD
        $('.js-hs-unfold-invoker').each(function () {
          var unfold = new HSUnfold($(this)).init();
        });
        
        // INITIALIZATION OF SELECT2
        $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // INITIALIZATION OF DATATABLES
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{-- GANTI DENGAN URL ROUTE ANDA UNTUK MENGAMBIL DATA --}}",
                data: function (d) {
                    d.search_type = $('#search-type').val();
                    d.search_value = $('#datatableSearch').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nop', name: 'nop' },
                { data: 'kode_billing', name: 'kode_billing' },
                { data: 'no_ketetapan', name: 'no_ketetapan' },
                { data: 'tgl_ketetapan', name: 'tgl_ketetapan' },
                { data: 'tgl_jatuh_tempo', name: 'tgl_jatuh_tempo' },
                { data: 'nama_pembeli', name: 'nama_pembeli' },
                { data: 'jumlah_kb', name: 'jumlah_kb' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'ver_kasi_penagihan', name: 'ver_kasi_penagihan', orderable: false, searchable: false },
                { data: 'ver_kasi_penilaian', name: 'ver_kasi_penilaian', orderable: false, searchable: false },
                { data: 'ver_kabid', name: 'ver_kabid', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            language: {
                zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src="{{ asset("assets/svg/illustrations/sorry.svg") }}" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
            },
            info: {
               totalQty: "#datatableWithPaginationInfoTotalQty"
            },
            entries: "#datatableEntries",
            pagination: "datatablePagination"
        });

        $('#search-button').on('click', function(e) {
            e.preventDefault();
            datatable.draw();
        });

        $('#datatableEntries').on('change', function() {
            datatable.page.len($(this).val()).draw();
        });
      });
    </script>

    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
  </body>
</html>
