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
    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main">
      <!-- Content -->
      <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title">Cek Nilai Jual Objek Pajak</h1>
            </div>
          </div>
          <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row">
          <div class="card-body">
              <div class="row form-group">
                  <label class="col-sm-2 col-form-label input-label">Nomor Objek Pajak:</label>
                  <div class="col-sm-3">
                      <input type="text" class="js-masked-input form-control" placeholder="Masukan Nomor Objek Pajak" data-hs-mask-options='{
                      "template": "00.00.000.000.000.0000.0"
                      }' name="nop" id="nop">
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" id="btn-cek">
                      <i class="tio-youtube-search"></i>
                      Cek NJOP
                    </button>
                  </div>
              </div>

              <div style="display: none;" id="result-njop">
                <h5 class="card-header-title">Hasil Pencarian:</h5>
                <div class="row">
                  <label class="col-sm-2 col-form-label input-label">NOP </label>
                  <label class="col-sm-3 col-form-label">: <span id="nopjk"></span></label>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label input-label">Luas Bumi </label>
                  <label class="col-sm-3 col-form-label">: <span id="luasbumi"></span> m<sup>2</sup></label>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label input-label">NJOP Bumi </label>
                  <label class="col-sm-3 col-form-label">: Rp <span id="njopbumi"></span></label>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label input-label">Luas Bangunan </label>
                  <label class="col-sm-3 col-form-label">: <span id="luasbng"></span> m<sup>2</sup></label>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label input-label">NJOP Bangunan </label>
                  <label class="col-sm-3 col-form-label">: Rp <span id="njopbng"></span></label>
                </div>
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

    <!-- JS Global Compulsory  -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="./assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside.min.js"></script>
    <script src="./assets/vendor/hs-unfold/dist/hs-unfold.min.js"></script>
    <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>
    <script src="{{ asset('assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>

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

        // INITIALIZATION OF MASKED INPUT
        // =======================================================
        $('.js-masked-input').each(function() {
            var mask = $.HSCore.components.HSMask.init($(this));
        });

      });

      $('#btn-cek').on('click', function(){
        let nop = $('#nop').val();
        // let newNOP = nop.replaceAll(".", "");
        
        $.ajax({
          url: "{{ route('getnjop') }}",
          type: "post",
          data: {
              _token: `{{ csrf_token() }}`,
              nop: nop
          },
          dataType: "json",
          success: function(result){
            $('#nopjk').text(nop);
            $('#luasbumi').text(result.total_luas_bumi);
            $('#njopbumi').text(format_ribuan(result.njop_bumi));
            $('#luasbng').text(result.total_luas_bng);
            $('#njopbng').text(format_ribuan(result.njop_bng));
            $('#result-njop').show();
          }
        })
      })

        function format_ribuan(bilangan)
        {                
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
    </script>

    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
  </body>
</html>
