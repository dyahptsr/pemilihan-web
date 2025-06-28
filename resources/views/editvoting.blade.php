<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .edit-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            animation: fadeInUp 0.5s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .edit-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .edit-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .edit-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
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
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
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
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            text-decoration: none;
            margin-top: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-back {
            display: inline-block;
            background: white;
            color: var(--primary-color);
            padding: 10px 20px;
            border: 1px solid var(--primary-color);
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            margin-bottom: 1.5rem;
        }

        .btn-back:hover {
            background-color: var(--light-color);
            transform: translateY(-2px);
        }

        .btn-back i {
            margin-right: 5px;
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

        .edit-footer {
            text-align: center;
            padding: 1rem 2rem 2rem;
            font-size: 0.85rem;
            color: var(--gray-color);
        }

        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            
            .edit-container {
                border-radius: 12px;
            }
            
            .edit-header {
                padding: 1.5rem;
            }
            
            .edit-body {
                padding: 1.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="floating-circles">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>

    <div class="edit-container">
        <div class="edit-header">
            <h1>Edit Data Peminjaman</h1>
        </div>

        <div class="edit-body">
            <a href="/tablevoting" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Table</a>
            
            @foreach($voting as $v)
            <form action="/voting/update" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $v->id_voting}}">
                
                <div class="form-group">
                    <label for="nama">Nama Pemilih:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $v->nama }}" required>
                </div>
                
                <div class="form-group">
                    <label for="nim">Nim Pemilih:</label>
                    <input type="text" id="nim" name="nim" class="form-control" value="{{ $v->nim}}" required>
                </div>
                
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select id="semester" name="semester" class="form-control" required>
                        <option value="" disabled selected>Pilih semester</option>
                        <option value="1" {{ $v->semester == 1 ? 'selected' : '' }}>Semester 1</option>
                        <option value="2" {{ $v->semester == 2 ? 'selected' : '' }}>Semester 2</option>
                        <option value="3" {{ $v->semester == 3 ? 'selected' : '' }}>Semester 3</option>
                        <option value="4" {{ $v->semester == 4 ? 'selected' : '' }}>Semester 4</option>
                        <option value="5" {{ $v->semester == 5 ? 'selected' : '' }}>Semester 5</option>
                        <option value="6" {{ $v->semester == 6 ? 'selected' : '' }}>Semester 6</option>
                        <option value="7" {{ $v->semester == 7 ? 'selected' : '' }}>Semester 7</option>
                        <option value="8" {{ $v->semester == 8 ? 'selected' : '' }}>Semester 8</option>
                    </select>
                </div>
                
                <div>
                    <input type="hidden" id="pilihan" name="pilihan" value="{{ $v->pilihan}}" required>
                </div>
                
                <button type="submit" class="btn">Simpan Perubahan</button>
            </form>
            @endforeach
        </div>

        <div class="edit-footer">
            <p>© 2023 Sistem Peminjaman Fasilitas. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>