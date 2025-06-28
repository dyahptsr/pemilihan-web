<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Ketua Organisasi</title>
    <style>
        /* Global Styles */
        :root {
            --primary-color: #6C63FF;
            --secondary-color: #4D44DB;
            --accent-color: #FF6584;
            --light-color: #F8F9FA;
            --dark-color: #2B2D42;
            --success-color: #38B000;
            --warning-color: #FFAA00;
            --danger-color: #EF233C;
            --gray-color: #8D99AE;
            --light-gray: #EDF2F4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
            font-size: 14px;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: "";
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        header::after {
            content: "";
            position: absolute;
            bottom: -50px;
            left: -20px;
            width: 200px;
            height: 200px;
            background-color: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        header h1 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header p {
            color: var(--light-gray);
            font-size: 0.9rem;
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        /* Hero Section */
        .hero {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem 0;
        }

        .hero-content {
            flex: 1;
            min-width: 250px;
        }

        .hero-content h2 {
            font-size: 1.6rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
            position: relative;
            display: inline-block;
        }

        .hero-content h2::after {
            content: "";
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
            border-radius: 2px;
        }

        .hero-content p {
            margin-bottom: 1rem;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .hero-image {
            flex: 1;
            min-width: 250px;
            text-align: center;
            position: relative;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .hero-image:hover img {
            transform: translateY(-3px);
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(108, 99, 255, 0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .btn:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(108, 99, 255, 0.4);
        }

        .btn:active {
            transform: translateY(1px);
        }

        /* Countdown Timer */
        .countdown {
            margin: 1.5rem 0;
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .countdown h3 {
            font-size: 1.1rem;
            margin-bottom: 0.8rem;
            color: var(--dark-color);
        }

        #countdown-timer {
            display: flex;
            gap: 0.8rem;
            margin-top: 0.8rem;
            flex-wrap: wrap;
        }

        #countdown-timer div {
            background: linear-gradient(135deg, var(--dark-color), #1A1B2F);
            color: white;
            padding: 0.8rem 0.5rem;
            border-radius: 8px;
            text-align: center;
            min-width: 70px;
            flex: 1;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        #countdown-timer div:hover {
            transform: translateY(-3px);
        }

        #countdown-timer span:first-child {
            display: block;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 3px;
        }

        #countdown-timer span:last-child {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        /* Footer Styles */
        footer {
            background: linear-gradient(135deg, var(--dark-color), #1A1B2F);
            color: white;
            padding: 1.5rem 0;
            margin-top: 2rem;
            text-align: center;
            position: relative;
        }

        footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        }

        footer p {
            margin: 0;
            font-size: 0.8rem;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content, .hero-image, .countdown {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .hero-image {
            animation-delay: 0.2s;
        }

        .countdown {
            animation-delay: 0.3s;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }
            
            .hero-content h2::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            
            header h1 {
                font-size: 1.5rem;
            }
            
            #countdown-timer div {
                min-width: 60px;
                padding: 0.6rem 0.4rem;
            }
            
            #countdown-timer span:first-child {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Pemilihan Ketua Organisasi 2025</h1>
            
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div class="hero-content">
                <h2>Tentang Pemilihan Ini</h2>
                <p>Pemilihan ketua organisasi tahunan kami akan menentukan pemimpin untuk periode 2025-2026.</p>
                <p>Pemilihan akan berlangsung pada <strong>16 Juni 2025</strong> pukul 08:00 - 16:00 WIB di gedung serbaguna kampus dan secara online melalui platform khusus.</p>
                
                
                @yield('home')
            <div class="hero-image">
                <img src="image/20.png" alt="Ilustrasi Pemilihan">
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Panitia Pemilihan Ketua Organisasi I-Tech | Hak Cipta Dilindungi</p>
        </div>
    </footer>

    <script>
        // Countdown Timer
        function updateCountdown() {
            const electionDate = new Date("2025-07-17T08:00:00");
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