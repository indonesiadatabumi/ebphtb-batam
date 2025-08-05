<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Login | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="https://bapenda.batam.go.id/favicon.ico" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="./assets/vendor/icon-set/style.css">
    <link rel="stylesheet" href="./assets/vendor/select2/dist/css/select2.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="./assets/css/theme.min.css">
</head>

<body class="d-flex align-items-center min-h-100">
    <!-- ========== HEADER ========== -->
    <header class="position-absolute top-0 left-0 right-0 mt-3 mx-3">
        <div class="d-flex d-lg-none justify-content-between">
            <a href="index.html">
                <img class="w-100" src="./assets/img/bapenda.png" alt="Image Description" style="min-width: 7rem; max-width: 7rem;">
            </a>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main pt-0">
        <!-- Content -->
        <div class="container-fluid px-3">
            <div class="row">
                <!-- Cover -->
                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light px-0">
                    <div class="position-absolute top-0 left-0 right-0 mt-3 mx-3">
                        <div class="d-none d-lg-flex justify-content-between">
                            <a href="index.html">
                                <img class="w-100" src="./assets/img/bapenda.png" alt="Image Description" style="min-width: 7rem; max-width: 7rem;">
                            </a>
                        </div>
                    </div>
                    <div style="max-width: 35rem;">
                        <div class="text-center mb-5">
                            <img class="img-fluid" src="./assets/img/Property-Tax.webp" alt="Image Description" style="opacity: 0.6; border-radius: 20px 20px 20px 20px;">
                        </div>
                    </div>
                </div>
                <!-- End Cover -->

                <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                    <div class="w-100 pt-10 pt-lg-7 pb-7" style="max-width: 25rem;">
                        <!-- Form -->
                        <form class="js-validate" action="{{ route('Login:Store') }}" method="post">
                            @csrf

                            @if(session()->has('loginError'))
                                <div class="alert alert-soft-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="tio-clear tio-lg"></i>
                                    </button>
                                </div>
                            @endif
                            
                            <div class="text-center mb-5">
                                <h1 class="display-4">Login </h1>
                            </div>

                            <div class="text-center mb-4">
                                <span class="divider text-muted"></span>
                            </div>

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrEmail">Username</label>

                                <input type="text" class="form-control form-control-lg" name="username" placeholder="username" aria-label="username" required data-msg="Please enter a valid username">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrPassword" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                        Password
                                        <!-- <a class="input-label-secondary" href="authentication-reset-password-cover.html">Forgot Password?</a> -->
                                    </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupSrPassword" placeholder="Password required" aria-label="Password required" required
                                        data-msg="Your password is invalid. Please try again."
                                        data-hs-toggle-password-options='{
                                                "target": "#changePassTarget",
                                                "defaultClass": "tio-hidden-outlined",
                                                "showClass": "tio-visible-outlined",
                                                "classChangeTarget": "#changePassIcon"
                                            }'>
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:;">
                                            <i id="changePassIcon" class="tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox --
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox">
                                    <label class="custom-control-label text-muted" for="termsCheckbox"> Remember me</label>
                                </div>
                            </div>
                            -- End Checkbox -->

                            <button type="submit" class="btn btn-lg btn-block btn-primary">Login</button>
                        </form>
                        <!-- End Form -->
                         <div class="text-center mt-2">
                            <a data-toggle="modal" data-target="#staticBackdrop" style="cursor: pointer;">Coba sekarang</a>
                         </div>
                          
                    </div>

                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Update user test</h5>
            <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
            <i class="tio-clear tio-lg"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                    Username : usertest <br />
                    Password : 123456
            </div>
            <form method="post" action="{{ route('login:update:usertest') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 input-label">Nama anda</label>
                    <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 input-label">Nomor HP</label>
                    <div class="col-sm-9">
                    <input type="text" name="nohp" class="form-control form-control-sm">
                    <span class="text-muted font-size-1">(Yang terdaftar whatsapp untuk mengirim otp)</span>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Update</button>
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
    <script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
    <script src="./assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./assets/vendor/select2/dist/js/select2.full.min.js"></script>

    <!-- JS Front -->
    <script src="./assets/js/theme.min.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF SHOW PASSWORD
            // =======================================================
            $('.js-toggle-password').each(function() {
                new HSTogglePassword(this).init()
            });


            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this));
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

        });

    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
</body>

</html>