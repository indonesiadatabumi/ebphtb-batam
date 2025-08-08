<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | EBPHTB</title>
    <link rel="shortcut icon" href="https://bapenda.batam.go.id/favicon.ico" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            background-image: url('/assets/img/lobby_batam.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            -webkit-backdrop-filter: blur(15px); /* Efek blur lebih kuat */
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
        }

        .form-section .logo {
            width: 100px;
            margin-bottom: 1.5rem;
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
        
        .form-label {
            font-weight: 500;
            color: var(--text-dark);
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
        
        /* Ikon Password Toggle dari Font Awesome */
        /* Pastikan Font Awesome sudah ter-link */
        .icon-password-visible::before { font-family: "Font Awesome 6 Free"; font-weight: 900; content: "\f06e"; } /* fa-eye */
        .icon-password-hidden::before { font-family: "Font Awesome 6 Free"; font-weight: 900; content: "\f070"; } /* fa-eye-slash */

        @media (max-width: 768px) {
            .decorative-section {
                display: none;
            }
            .form-section {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="form-section">
            <img src="/assets/img/bapenda.png" alt="Logo Bapenda" class="logo">
            <h1>Selamat Datang Kembali</h1>
            <p>Silakan masuk untuk melanjutkan ke E-BPHTB.</p>

            <form class="js-validate" action="{{ route('Login:Store') }}" method="post">
                @csrf
                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username Anda" required>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="signupSrPassword">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="signupSrPassword" placeholder="Masukkan password Anda" required>
                        <a id="changePassTarget" class="input-group-text text-decoration-none" href="javascript:;" style="cursor: pointer;">
                            <i id="changePassIcon" class="icon-password-hidden"></i>
                        </a>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="text-center mt-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Coba dengan akun demo?</a>
                </div>
            </form>
        </div>

        <div class="decorative-section">
            <div class="decorative-content">
                <img src="/assets/img/Property-Tax.webp" alt="Pajak Properti" class="decorative-img">
                <h2>Layanan Pajak Terintegrasi</h2>
                <p>Akses mudah dan cepat untuk semua kebutuhan perpajakan Anda.</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update User Test</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('login:update:usertest') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <strong>Username:</strong> usertest <br />
                            <strong>Password:</strong> 123456
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Anda</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp" class="form-control">
                                <small class="text-muted">(Nomor WhatsApp aktif untuk OTP)</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- KODE BARU UNTUK FUNGSI TOGGLE PASSWORD ---

        const passwordInput = document.getElementById('signupSrPassword');
        const toggleButton = document.getElementById('changePassTarget');
        const passwordIcon = document.getElementById('changePassIcon');

        if (toggleButton) {
            toggleButton.addEventListener('click', function() {
                // Cek tipe input saat ini
                if (passwordInput.type === 'password') {
                    // Jika tipe adalah password, ubah menjadi text
                    passwordInput.type = 'text';
                    passwordIcon.classList.remove('icon-password-hidden');
                    passwordIcon.classList.add('icon-password-visible');
                } else {
                    // Jika tipe adalah text, ubah kembali menjadi password
                    passwordInput.type = 'password';
                    passwordIcon.classList.remove('icon-password-visible');
                    passwordIcon.classList.add('icon-password-hidden');
                }
            });
        }
    });
    </script>
</body>
</html>