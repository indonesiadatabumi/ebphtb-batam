<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verify OTP | EBPHTB</title>
    <link rel="shortcut icon" href="https://bapenda.batam.go.id/favicon.ico" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --primary-color: #0d6efd;
            --dark-blue-bg: #181c4a;
            --text-dark: #333;
            --text-muted: #6c757d;
            --text-light: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1.5rem;
            background-image: url("{{ asset('assets/img/lobby_batam.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            -webkit-backdrop-filter: blur(3px);
            backdrop-filter: blur(3px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-card {
            width: 100%;
            max-width: 960px;
            border-radius: 1.25rem;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
        }

        .form-section {
            flex-basis: 55%;
            padding: 3rem 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
            text-align: center;
        }

        .form-section .logo {
            width: 100px;
            margin: 0 auto 1.5rem auto;
        }

        .form-section h1 {
            font-weight: 600;
            font-size: 1.75rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-section p {
            color: var(--text-muted);
            margin-bottom: 2rem;
        }
        
        .form-control {
            border-radius: 0.5rem;
            padding: 0.8rem 1rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .decorative-section {
            position: relative;
            flex-basis: 45%;
            background-color: var(--dark-blue-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
        }
        
        .decorative-content {
            color: var(--text-light);
            padding: 1rem;
        }
        
        .decorative-img {
            width: 100%;
            max-width: 180px;
            height: auto;
            margin-bottom: 1.5rem;
            border-radius: 1rem;
        }

        .decorative-content h2 {
            font-size: 1.75rem;
            font-weight: bold;
        }

        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .otp-inputs input {
            width: 45px;
            height: 45px;
            text-align: center;
            font-size: 1.25rem;
            font-weight: 600;
        }
        
        #countdown-timer {
            font-weight: 600;
            color: var(--primary-color);
            border: none;
            text-align: center;
            background: transparent;
            pointer-events: none;
        }
        
        @media (max-width: 768px) {
            .decorative-section {
                display: none;
            }
            .form-section {
                flex-basis: 100%;
            }
        }
        
        .swal2-popup.swal2-poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="form-section">
            <img src="{{ asset('assets/img/bapenda.png') }}" alt="Logo Bapenda" class="logo">
            <h1>Verifikasi Akun Anda</h1>
            <p>Silakan masukkan kode OTP yang dikirim ke nomor <br>*******{{ $maskNohp }}</p>

            <form class="js-validate" id="otp-form" action="{{ route('Login:verifyOTP') }}" method="post">
                @csrf
                
                <div id="otp" class="otp-inputs">
                    <input class="form-control" type="text" name="otp_digits[]" maxlength="1" autofocus />
                    <input class="form-control" type="text" name="otp_digits[]" maxlength="1" />
                    <input class="form-control" type="text" name="otp_digits[]" maxlength="1" />
                    <input class="form-control" type="text" name="otp_digits[]" maxlength="1" />
                    <input class="form-control" type="text" name="otp_digits[]" maxlength="1" />
                    <input class="form-control" type="text" name="otp_digits[]" maxlength="1" />
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control" id="countdown-timer" name="countdowntimer" value="{{ (isset($timer) ? $timer : '05:00') }}" readonly>
                </div>

                <input type="hidden" name="nohp" id="nohp" value="{{ $nohp }}">
                <input type="hidden" name="username" value="{{ $username }}">
                <input type="hidden" name="password" value="{{ $pwd }}">

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary" id="verify-btn">Verifikasi</button>
                </div>
                 <a href="#">Tidak menerima kode? Kirim ulang</a>
            </form>
        </div>

        <div class="decorative-section">
            <div class="decorative-content">
                <img src="{{ asset('assets/img/Property-Tax.webp') }}" alt="Pajak Properti" class="decorative-img">
                <h2>Layanan Pajak Terintegrasi</h2>
                <p>Akses mudah dan cepat untuk semua kebutuhan perpajakan Anda.</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        $(function() {
            // === LOGIKA TIMER (Tidak berubah) ===
            let minutes = parseInt("{{ isset($minute) ? $minute : 5 }}", 10);
            let seconds = parseInt("{{ isset($second) ? $second : 0 }}", 10);
            let countdownInterval = setInterval(updateTimer, 1000);

            function updateTimer() {
                if (seconds === 0) {
                    if (minutes === 0) {
                        clearInterval(countdownInterval);
                        $('#countdown-timer').val("Waktu habis.");
                        $('#verify-btn').prop("disabled", true);
                        setTimeout(() => window.location.href = "{{ url('login') }}", 2000);
                        return;
                    }
                    minutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }
                const formattedMinutes = String(minutes).padStart(2, '0');
                const formattedSeconds = String(seconds).padStart(2, '0');
                $('#countdown-timer').val(`${formattedMinutes}:${formattedSeconds}`);
            }

            // === LOGIKA INPUT OTP (Tidak berubah) ===
            const inputs = document.querySelectorAll('#otp > input');
            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && !e.target.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });


            // *** PERUBAHAN UTAMA: MENGGANTI SUBMIT STANDAR DENGAN AJAX ***
            $('#otp-form').on('submit', function(e) {
                e.preventDefault(); // Mencegah halaman reload

                const form = $(this);
                const verifyBtn = $('#verify-btn');
                
                // Gabungkan semua digit OTP menjadi satu string
                let otpCode = '';
                $('input[name="otp_digits[]"]').each(function() {
                    otpCode += $(this).val();
                });

                // Validasi sederhana di client-side
                if (otpCode.length < 6) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'OTP Tidak Lengkap',
                        text: 'Harap isi semua 6 digit kode OTP.',
                        customClass: { popup: 'swal2-poppins' }
                    });
                    return;
                }

                // Tampilkan status loading pada tombol
                verifyBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memverifikasi...');

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize() + '&otp_combined=' + otpCode, // Kirim data form + otp yang sudah digabung
                    dataType: 'json', // Harapkan respons dalam format JSON dari server
                    success: function(response) {
                        // Jika server merespons dengan status 'success'
                        if (response.status === 'success') {
                            clearInterval(countdownInterval); // Hentikan timer
                            Swal.fire({
                                icon: 'success',
                                title: 'Verifikasi Berhasil!',
                                text: response.message,
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                                customClass: { popup: 'swal2-poppins' },
                                willClose: () => {
                                    // Arahkan ke URL yang diberikan server setelah pop-up tertutup
                                    window.location.href = response.redirect_url;
                                }
                            });
                        } else {
                            // Jika server merespons dengan status 'error' (misal: OTP salah)
                            Swal.fire({
                                icon: 'error',
                                title: 'Verifikasi Gagal!',
                                text: response.message,
                                confirmButtonText: 'Coba Lagi',
                                customClass: { popup: 'swal2-poppins' }
                            });
                            // Aktifkan kembali tombol setelah menampilkan error
                            verifyBtn.prop('disabled', false).text('Verifikasi');
                        }
                    },
                    error: function() {
                        // Jika terjadi error koneksi atau server (misal: 500 Internal Server Error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Tidak dapat terhubung ke server. Silakan coba lagi nanti.',
                            customClass: { popup: 'swal2-poppins' }
                        });
                        // Aktifkan kembali tombol
                        verifyBtn.prop('disabled', false).text('Verifikasi');
                    }
                });
            });
        });
    </script>
</body>

</html>