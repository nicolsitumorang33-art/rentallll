<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - RenMobil</title>
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

        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .login-left {
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

        .login-left::before {
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

        .login-left::after {
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

        .login-left-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 400px;
        }

        .login-left h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 15px;
        }

        .login-left h1 span {
            color: var(--primary);
        }

        .login-left p {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            line-height: 1.7;
        }

        .login-left-features {
            margin-top: 40px;
            text-align: left;
        }

        .login-left-features li {
            list-style: none;
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .login-left-features li i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        .login-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: var(--light);
        }

        .login-form-container {
            width: 100%;
            max-width: 420px;
        }

        .login-form-header {
            margin-bottom: 40px;
        }

        .login-form-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .login-form-header p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text);
            margin-bottom: 8px;
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
            padding: 14px 15px 14px 45px;
            border: 2px solid var(--gray);
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s;
            background: var(--gray);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--light);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-login {
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
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 57, 53, 0.4);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
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

        .signup-link {
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
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
            .login-left {
                display: none;
            }

            .login-right {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            .login-right {
                padding: 20px;
            }

            .login-form-header h2 {
                font-size: 1.6rem;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="login-left-content">
                <h1>Rent<span>Mobil</span></h1>
                <p>Platform rental mobil terpercaya untuk perjalanan Anda. Nikmati kemudahan sewa mobil dengan harga terbaik.</p>
                <ul class="login-left-features">
                    <li><i class="fas fa-check-circle"></i> Armada berkualitas dan terawat</li>
                    <li><i class="fas fa-check-circle"></i> Harga transparan tanpa biaya tersembunyi</li>
                    <li><i class="fas fa-check-circle"></i> Layanan customer service 24/7</li>
                    <li><i class="fas fa-check-circle"></i> Proses pemesanan cepat dan mudah</li>
                </ul>
            </div>
        </div>

        <div class="login-right">
            <div class="login-form-container">
                <div class="login-form-header">
                    <h2>Selamat Datang</h2>
                    <p>Masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <?php if(session('status')): ?>
                    <div class="error-message">
                        <i class="fas fa-check-circle"></i>
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo e($errors->first()); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Masukkan email Anda" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember"> Ingat saya
                        </label>
                        <a href="#" class="forgot-link">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn-login">
                        Masuk <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="divider"><span>atau</span></div>

                <p class="signup-link">
                    Belum punya akun? <a href="#">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/login.blade.php ENDPATH**/ ?>