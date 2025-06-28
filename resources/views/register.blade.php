<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Pemilihan Ketua Organisasi</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --gray-color: #95a5a6;
            --light-gray: #bdc3c7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .register-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            animation: fadeInUp 0.5s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .register-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .register-header h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .register-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .register-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--success-color), #27ae60);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s;
            text-align: center;
            width: 100%;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-login {
            background: white;
            color: var(--success-color);
            border: 1px solid var(--success-color);
            box-shadow: none;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background: rgba(46, 204, 113, 0.1);
        }

        .error-message {
            background-color: #fadbd8;
            color: var(--danger-color);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .error-message ul {
            list-style-position: inside;
        }

        .terms-group {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .terms-group input {
            margin-right: 10px;
            width: auto;
        }

        .terms-group label {
            margin-bottom: 0;
            font-weight: normal;
        }

        .register-footer {
            text-align: center;
            padding: 1rem 2rem 2rem;
            font-size: 0.85rem;
            color: var(--gray-color);
        }

        .floating-circles {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(52, 152, 219, 0.1);
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .circle-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            
            .register-container {
                border-radius: 12px;
            }
            
            .register-header {
                padding: 1.5rem;
            }
            
            .register-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-circles">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>

    <div class="register-container">
        <div class="register-header">
            <h1>Daftar Anggota Baru</h1>
            <p>Buat akun untuk berpartisipasi dalam pemilihan</p>
        </div>

        <div class="register-body">
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf

                <div class="form-group">
                    <label for="nama">Username</label>
                    <input type="text" id="nama" name="username" class="form-control" required placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control" required pattern="[0-9]{9}" placeholder="Masukkan NIM Anda" value="{{ old('nim') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required placeholder="Buat password (minimal 6 karakter)">
                </div>

                <div class="form-group">
                    <label for="confirm-password">Konfirmasi Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control" required placeholder="Ulangi password Anda">
                </div>

                <div class="terms-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya menyetujui syarat dan ketentuan</label>
                </div>

                <button type="submit" class="btn">Daftar Sekarang</button>
                <a href="/login" class="btn btn-login">Sudah punya akun? Login</a>
            </form>
        </div>

        <div class="register-footer">
            <p>Dengan mendaftar, Anda menyetujui semua persyaratan kami</p>
        </div>
    </div>
</body>
</html>