<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun - RennMobil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #e53935;
            --primary-dark: #b71c1c;
            --dark: #1a1a2e;
            --light: #ffffff;
            --gray: #f5f5f5;
            --text: #333333;
            --text-light: #666666;
            --shadow: 0 10px 40px rgba(0,0,0,0.15);
            --radius: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            background: var(--gray);
        }

        .register-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .register-left {
            flex: 1;
            background: linear-gradient(135deg, var(--dark) 0%, #0f3460 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0.1;
            top: -100px;
            left: -100px;
        }

        .register-left::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0.05;
            bottom: -80px;
            right: -80px;
        }

        .register-left-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 400px;
        }

        .register-left h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 15px;
        }

        .register-left h1 span {
            color: var(--primary);
        }

        .register-left p {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            line-height: 1.7;
        }

        .register-left-features {
            margin-top: 40px;
            text-align: left;
        }

        .register-left-features li {
            list-style: none;
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .register-left-features li i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        .register-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: var(--light);
        }

        .register-form-container {
            width: 100%;
            max-width: 420px;
        }

        .register-form-header {
            margin-bottom: 35px;
        }

        .register-form-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .register-form-header p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            font-size: 0.85rem;
            color: var(--text);
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1rem;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px 13px 45px;
            border: 2px solid var(--gray);
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s;
            background: var(--gray);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--light);
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: var(--light);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 8px;
        }

        .btn-register:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 57, 53, 0.4);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gray);
        }

        .divider span {
            padding: 0 15px;
        }

        .login-link {
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .back-link {
            position: absolute;
            top: 30px;
            left: 30px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            z-index: 3;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: var(--light);
        }

        .error-message {
            background: #ffebee;
            color: var(--primary-dark);
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @media (max-width: 1024px) {
            .register-left {
                display: none;
            }

            .register-right {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            .register-right {
                padding: 20px;
            }

            .register-form-header h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <div class="register-left-content">
                <h1>Renn<span>Mobil</span></h1>
                <p>Platform rental mobil terpercaya untuk perjalanan Anda. Nikmati kemudahan sewa mobil dengan harga terbaik.</p>
                <ul class="register-left-features">
                    <li><i class="fas fa-check-circle"></i> Armada berkualitas dan terawat</li>
                    <li><i class="fas fa-check-circle"></i> Harga transparan tanpa biaya tersembunyi</li>
                    <li><i class="fas fa-check-circle"></i> Layanan customer service 24/7</li>
                    <li><i class="fas fa-check-circle"></i> Proses pemesanan cepat dan mudah</li>
                </ul>
            </div>
        </div>

        <div class="register-right">
            <div class="register-form-container">
                <div class="register-form-header">
                    <h2>Buat Akun Baru</h2>
                    <p>Daftar untuk mulai menyewa mobil</p>
                </div>

                @if($errors->any())
                    <div class="error-message" style="flex-direction:column;align-items:flex-start;gap:4px">
                        @foreach($errors->all() as $error)
                            <span><i class="fas fa-exclamation-circle"></i> {{ $error }}</span>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="regPassword" placeholder="Minimal 8 karakter" required minlength="8">
                            <span class="fas fa-eye toggle-pw" onclick="togglePW('regPassword', this)" style="position:absolute;right:15px;top:50%;transform:translateY(-50%);cursor:pointer;color:#aaa"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password_confirmation" id="regPasswordConfirm" placeholder="Ketik ulang password" required minlength="8">
                            <span class="fas fa-eye toggle-pw" onclick="togglePW('regPasswordConfirm', this)" style="position:absolute;right:15px;top:50%;transform:translateY(-50%);cursor:pointer;color:#aaa"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn-register">
                        Daftar <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="divider"><span>atau</span></div>

                <p class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk Sekarang</a>
                </p>
            </div>
        </div>
    </div>
<script>
    function togglePW(id, el) {
        const input = document.getElementById(id);
        if (input.type === 'password') {
            input.type = 'text';
            el.classList.remove('fa-eye');
            el.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            el.classList.remove('fa-eye-slash');
            el.classList.add('fa-eye');
        }
    }
</script>
</body>
</html>
