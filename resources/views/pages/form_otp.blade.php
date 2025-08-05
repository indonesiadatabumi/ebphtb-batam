<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Verify OTP | EBPHTB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="https://bapenda.batam.go.id/favicon.ico" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
</head>

<body class="d-flex align-items-center min-h-100">
    <!-- ========== HEADER ========== -->
    <header class="position-absolute top-0 left-0 right-0 mt-3 mx-3">
        <div class="d-flex d-lg-none justify-content-between">
            <a href="index.html">
                <img class="w-100" src="{{ asset('assets/img/bapenda.png') }}" alt="Image Descriptionn" style="min-width: 7rem; max-width: 7rem;">
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
                                <img class="w-100" src="{{ asset('assets/img/bapenda.png') }}" alt="Image Description" style="min-width: 7rem; max-width: 7rem;">
                            </a>
                        </div>
                    </div>
                    <div style="max-width: 35rem;">
                        <div class="text-center mb-5">
                            <img class="img-fluid" src="{{ asset('assets/img/Property-Tax.webp') }}" alt="Image Description" style="opacity: 0.6; border-radius: 20px 20px 20px 20px;">
                        </div>
                    </div>
                </div>
                <!-- End Cover -->

                <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                    <div class="w-100 pb-10" style="max-width: 25rem;">
                        <!-- Form -->
                        <form class="js-validate" action="{{ route('Login:verifyOTP') }}" method="post">
                            @csrf                            
                            <div class="p-2 text-center">
                                <h2>Silahkan masukan kode OTP anda <br> untuk verifikasi akun login</h2>
                                <div> Kode OTP dikirim ke nomor <small id="maskedNumber">*******{{ $maskNohp }}</small> </div>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                    <input class="m-2 text-center form-control rounded" type="text" id="first" name="otpfirst" maxlength="1" autofocus />
                                    <input class="m-2 text-center form-control rounded" type="text" id="second" name="otpsecond" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="third" name="otpthird" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="fourth" name="otpfourth" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="fifth" name="otpfifth" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="sixth" name="otpsixth" maxlength="1" />
                                </div>
                                <div class="mt-2 mb-3"> 
                                    <!-- <div id="countdown-timer">05:00</div> -->
                                    <div class="input-group input-group-merge input-group-borderless input-group-flush">
                                        <input type="text" class="form-control text-center" id="countdown-timer" name="countdowntimer" value="{{ (isset($timer) ? $timer : '05:00') }}">
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="nohp" id="nohp" value="{{ $nohp }}">
                            <input type="hidden" name="username" value="{{ $username }}">
                            <input type="hidden" name="password" value="{{ $pwd }}">
                            <button type="submit" class="btn btn-lg btn-block btn-primary" id="verify-btn">Verifikasi </button>
                        </form>
                        <!-- End Form -->

                        @if(session()->has('loginError'))
                            <div class="alert alert-soft-danger alert-dismissible fade show mt-2" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="tio-clear tio-lg"></i>
                                </button>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Global Compulsory  -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <!-- JS Front -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

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

            
            let minutes = {{ (isset($minute) ? $minute : 5) }};
            let seconds = {{ (isset($second) ? $second : 0) }};
            // const timerDisplay = document.getElementById('countdown-timer');
            // const timerDisplay = $('#countdown-timer').val();

            function updateTimer() {
                if (seconds === 0) {
                    if (minutes === 0) {
                        clearInterval(countdownInterval); // Stop the timer
                        // timerDisplay.textContent = "Waktu habis.";
                        $('#countdown-timer').val("Waktu habis.");
                        $('#verify-btn').prop("disabled", true);
                        
                        setTimeout(function() {
                            window.location.href = "{{ url('login') }}"; // Replace with your desired URL
                        }, 2000); 
                        return;
                    }
                    minutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }

                const formattedMinutes = String(minutes).padStart(2, '0');
                const formattedSeconds = String(seconds).padStart(2, '0');
                // timerDisplay.textContent = `${formattedMinutes}:${formattedSeconds}`;
                $('#countdown-timer').val(`${formattedMinutes}:${formattedSeconds}`);
            }

            // Initial display
            // timerDisplay.textContent = `05:00`;

            // Start the countdown
            const countdownInterval = setInterval(updateTimer, 1000);

            OTPInput();
        });

        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('input', function() {
                    if (this.value.length > 1) {
                        this.value = this.value[0]; //    
                    }
                    if (this.value !== '' && i < inputs.length - 1) {
                        inputs[i + 1].focus(); //   
                    }
                });

                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === 'Backspace') {
                        this.value = '';
                        if (i > 0) {
                            inputs[i - 1].focus();   
                        }
                    }
                });
            }
        }

    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
</body>

</html>