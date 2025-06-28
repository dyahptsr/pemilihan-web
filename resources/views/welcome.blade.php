<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Pemilihan Ketua Organisasi</title>
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

        .welcome-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            animation: fadeInUp 0.5s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .welcome-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .welcome-header p {
            opacity: 0.9;
            font-size: 1rem;
            position: relative;
            z-index: 2;
        }

        .welcome-body {
            padding: 2rem;
        }

        .countdown {
            background-color: var(--light-color);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .countdown h3 {
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        #countdown-timer {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        #countdown-timer div {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 70px;
        }

        #countdown-timer span:first-child {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        #countdown-timer span:last-child {
            font-size: 0.8rem;
            color: var(--gray-color);
            margin-top: 0.3rem;
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
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .reasons-container {
            margin-top: 2rem;
        }

        .reasons-container h2 {
            color: var(--dark-color);
            margin-bottom: 1rem;
            text-align: center;
        }

        .reasons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .reason-card {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .reason-card:hover {
            transform: translateY(-5px);
        }

        .reason-card h3 {
            color: var(--primary-color);
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
        }

        .reason-card h3 i {
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }

        .reason-card p {
            color: var(--dark-color);
            font-size: 0.95rem;
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

        .welcome-footer {
            text-align: center;
            padding: 1rem 2rem 2rem;
            font-size: 0.85rem;
            color: var(--gray-color);
        }

        @media (max-width: 768px) {
            #countdown-timer {
                flex-wrap: wrap;
            }
            
            #countdown-timer div {
                min-width: 60px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            
            .welcome-container {
                border-radius: 12px;
            }
            
            .welcome-header {
                padding: 1.5rem;
            }
            
            .welcome-body {
                padding: 1.5rem;
            }
            
            .countdown {
                padding: 1rem;
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

    <div class="welcome-container">
        <div class="welcome-header">
            <h1>Pemilihan Ketua Organisasi Mahasiswa</h1>
            <p>Suara Anda menentukan masa depan organisasi kita</p>
        </div>

        <div class="welcome-body">
            <div class="countdown">
                <h3>Waktu Menuju Pemilihan:</h3>
                <div id="countdown-timer">
                    <div><span id="days">00</span><span>Hari</span></div>
                    <div><span id="hours">00</span><span>Jam</span></div>
                    <div><span id="minutes">00</span><span>Menit</span></div>
                    <div><span id="seconds">00</span><span>Detik</span></div>
                </div>
            </div>
            
            <div class="reasons-container">
                <h2>Mengapa Anda Harus Memilih?</h2>
                <div class="reasons-grid">
                    <div class="reason-card">
                        <h3><i class="fas fa-bullhorn"></i> Suara Anda Berarti</h3>
                        <p>Setiap suara menentukan arah organisasi kita. Partisipasi Anda memastikan keputusan yang dibuat benar-benar mewakili keinginan anggota.</p>
                    </div>
                    
                    <div class="reason-card">
                        <h3><i class="fas fa-handshake"></i> Bentuk Masa Depan</h3>
                        <p>Pemimpin yang Anda pilih akan membawa visi dan program kerja yang mempengaruhi seluruh kegiatan organisasi di tahun mendatang.</p>
                    </div>
                    
                    <div class="reason-card">
                        <h3><i class="fas fa-users"></i> Hak Anggota</h3>
                        <p>Sebagai anggota organisasi, voting adalah hak dan kewajiban Anda untuk memastikan transparansi dan demokrasi dalam pemilihan.</p>
                    </div>
                    
                    <div class="reason-card">
                        <h3><i class="fas fa-chart-line"></i> Pengaruh Langsung</h3>
                        <p>Keputusan pemimpin terpilih akan mempengaruhi kualitas kegiatan, hubungan antar angkatan, dan reputasi organisasi kita.</p>
                    </div>
                </div>
            </div>
            
            <a href="pemilihan/tambah" class="btn">Voting Sekarang</a>
            <p style="margin-top: 0.8rem; font-size: 0.8rem; color: var(--gray-color); text-align: center;">*Hanya anggota terdaftar yang dapat berpartisipasi</p>
        </div>

        <div class="welcome-footer">
            <p>© 2023 Pemilihan Ketua Organisasi Mahasiswa. Semua hak dilindungi.</p>
        </div>
    </div>

    <script>
         // Countdown Timer (updated to match master.blade.php)
    function updateCountdown() {
        const electionDate = new Date("2025-06-17T08:00:00");
        const now = new Date();
        const diff = electionDate - now;
        
        if (diff <= 0) {
            document.getElementById('countdown-timer').innerHTML = '<div style="flex: 1 0 100%; padding: 1rem; background: linear-gradient(135deg, var(--success-color), #2CAE00);"><span style="font-size: 1.2rem;">Pemilihan telah dimulai!</span></div>';
            document.querySelector('.btn').textContent = 'MASUK KE TEMPAT PEMILIHAN';
            return;
        }
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById('days').textContent = days.toString().padStart(2, '0');
        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
    }

    // Update countdown every second
    updateCountdown();
    setInterval(updateCountdown, 1000);
    </script>
</body>
</html>