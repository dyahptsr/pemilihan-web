<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Ketua Organisasi</title>
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
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .voting-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            overflow: hidden;
            animation: fadeInUp 0.5s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .voting-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .voting-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }

        .voting-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
            position: relative;
        }

        .voting-header p {
            opacity: 0.9;
            font-size: 1rem;
            position: relative;
        }

        .voting-body {
            padding: 2.5rem;
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
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            transition: all 0.5s;
            opacity: 0;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
        }

        .btn:hover::after {
            opacity: 1;
            top: -20%;
            left: -20%;
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-back {
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            box-shadow: none;
            margin-bottom: 1.5rem;
            width: auto;
            padding: 10px 20px;
        }

        .btn-back:hover {
            background: var(--light-color);
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

        .voting-footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.9rem;
            color: var(--gray-color);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
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
            background: rgba(52, 152, 219, 0.08);
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

        /* Candidate Section */
        .candidates-section {
            margin-top: 3rem;
            text-align: center;
        }

        .section-title {
            font-size: 1.5rem;
            color: var(--dark-color);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 3px;
        }

        .section-subtitle {
            color: var(--gray-color);
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        /* Candidate Cards */
        .candidates-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }

        .candidate-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            width: 350px;
            position: relative;
        }

        .candidate-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .candidate-header {
            padding: 2rem;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .candidate-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }

        .candidate-number {
            display: inline-block;
            background: white;
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            line-height: 40px;
            font-weight: bold;
            margin-bottom: 1.5rem;
            position: relative;
            font-size: 1.1rem;
        }

        .candidate-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            margin: 0 auto 1.5rem;
            display: block;
            background: #ddd;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .candidate-name {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .candidate-team {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
        }

        .candidate-body {
            padding: 2rem;
        }

        .vision-mission-table {
            width: 100%;
            margin-bottom: 1.5rem;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .vision-mission-table th {
            background: var(--light-color);
            padding: 12px 15px;
            text-align: left;
            font-size: 0.95rem;
            color: var(--dark-color);
            border-bottom: 2px solid var(--light-gray);
        }

        .vision-mission-table td {
            padding: 12px 15px;
            font-size: 0.9rem;
            color: var(--dark-color);
            border-bottom: 1px solid var(--light-gray);
        }

        .vision-mission-table tr:last-child td {
            border-bottom: none;
        }

        .btn-select {
            background: var(--success-color);
            margin-top: 1.5rem;
            width: 100%;
        }

        .btn-select:hover {
            background: #27ae60;
            box-shadow: 0 8px 25px rgba(46, 204, 113, 0.4);
        }

        .selected {
            border: 2px solid var(--success-color);
            position: relative;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(46, 204, 113, 0.2);
        }

        .selected-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--success-color);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        /* Confirmation Section */
        .confirmation-section {
            display: none;
            margin-top: 3rem;
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid #eee;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .confirmation-section h3 {
            margin-bottom: 1.5rem;
            color: var(--dark-color);
            font-size: 1.3rem;
            position: relative;
            display: inline-block;
        }

        .confirmation-section h3::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--warning-color), #e67e22);
            border-radius: 3px;
        }

        .confirmation-section p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .confirmation-section strong {
            color: var(--primary-color);
            font-weight: 600;
        }

        .btn-confirm {
            background: linear-gradient(135deg, var(--warning-color), #e67e22);
            width: auto;
            padding: 12px 30px;
            display: inline-block;
        }

        .btn-cancel {
            background: white;
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
            margin-top: 1rem;
            width: auto;
            padding: 10px 25px;
            box-shadow: none;
        }

        .btn-cancel:hover {
            background: #fadbd8;
        }

        /* Animation */
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

        /* Responsive */
        @media (max-width: 1200px) {
            .candidates-container {
                gap: 1.5rem;
            }
            
            .candidate-card {
                width: 320px;
            }
        }

        @media (max-width: 992px) {
            .candidates-container {
                flex-wrap: wrap;
            }
            
            .candidate-card {
                width: 100%;
                max-width: 400px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1.5rem;
            }
            
            .voting-container {
                border-radius: 12px;
            }
            
            .voting-header {
                padding: 2rem;
            }
            
            .voting-body {
                padding: 2rem;
            }
            
            .candidate-card {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }
            
            .voting-header {
                padding: 1.5rem;
            }
            
            .voting-header h1 {
                font-size: 1.5rem;
            }
            
            .voting-body {
                padding: 1.5rem;
            }
            
            .candidate-header {
                padding: 1.5rem;
            }
            
            .candidate-body {
                padding: 1.5rem;
            }
            
            .confirmation-section {
                padding: 1.5rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="floating-circles">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>

    <div class="voting-container">
        <div class="voting-header">
            <h1>Pemilihan Ketua Organisasi</h1>
            <p>Silakan lengkapi data diri dan pilih kandidat favorit Anda</p>
        </div>

        <div class="voting-body">
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/voting/storetambah" method="post" id="votingForm">
                {{ csrf_field() }}

                <a href="/welcome" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>

                <div class="form-row" style="display: flex; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div class="form-group" style="flex: 1;">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="nim">NIM</label>
                        <input type="number" id="nim" name="nim" class="form-control" required placeholder="Masukkan NIM">
                    </div>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select id="semester" name="semester" class="form-control" required>
                        <option value="" disabled selected>Pilih semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div>

                <input type="hidden" id="pilihan" name="pilihan" required>

                <!-- Candidates Section -->
                <div class="candidates-section">
                    <h2 class="section-title">Profil Kandidat</h2>
                    <p class="section-subtitle">Silakan pilih salah satu kandidat di bawah ini</p>

                    <div class="candidates-container">
                        <!-- Candidate 1 -->
                        <div class="candidate-card" id="candidate1" onclick="selectCandidate('paslon 1')">
                            <div class="candidate-header">
                                <div class="candidate-number">1</div>
                                <img src="https://events.rumah123.com/wp-content/uploads/sites/41/2023/09/12160753/gambar-foto-profil-whatsapp-kosong.jpg" alt="Paslon 1" class="candidate-photo">
                                <div class="candidate-name">Paslon 1</div>
                                <div class="candidate-team">Raka & Tio</div>
                            </div>
                            <div class="candidate-body">
                                <table class="vision-mission-table">
                                    <tr>
                                        <th colspan="2">Visi</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Mewujudkan organisasi yang inovatif, kolaboratif, dan berintegritas untuk kemajuan bersama seluruh anggota.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Misi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Meningkatkan kualitas program kerja organisasi</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Memperkuat jaringan dengan organisasi lain</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Menciptakan sistem yang transparan dan akuntabel</td>
                                    </tr>
                                </table>
                                <button type="button" class="btn btn-select" onclick="selectCandidate('paslon 1', event)">
                                    Pilih Kandidat 1
                                </button>
                            </div>
                        </div>

                        <!-- Candidate 2 -->
                        <div class="candidate-card" id="candidate2" onclick="selectCandidate('paslon 2')">
                            <div class="candidate-header" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">
                                <div class="candidate-number">2</div>
                                <img src="https://events.rumah123.com/wp-content/uploads/sites/41/2023/09/12160753/gambar-foto-profil-whatsapp-kosong.jpg" alt="Paslon 2" class="candidate-photo">
                                <div class="candidate-name">Paslon 2</div>
                                <div class="candidate-team">Daru & Hamdi</div>
                            </div>
                            <div class="candidate-body">
                                <table class="vision-mission-table">
                                    <tr>
                                        <th colspan="2">Visi</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Membangun organisasi yang responsif terhadap kebutuhan anggota dan menjadi wadah pengembangan potensi diri.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Misi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mengoptimalkan peran organisasi sebagai sarana belajar</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Meningkatkan kesejahteraan anggota melalui program nyata</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Memperkuat identitas dan branding organisasi</td>
                                    </tr>
                                </table>
                                <button type="button" class="btn btn-select" style="background: linear-gradient(135deg, #e74c3c, #c0392b);" onclick="selectCandidate('paslon 2', event)">
                                    Pilih Kandidat 2
                                </button>
                            </div>
                        </div>

                        <!-- Candidate 3 -->
                        <div class="candidate-card" id="candidate3" onclick="selectCandidate('paslon 3')">
                            <div class="candidate-header" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">
                                <div class="candidate-number">3</div>
                                <img src="https://events.rumah123.com/wp-content/uploads/sites/41/2023/09/12160753/gambar-foto-profil-whatsapp-kosong.jpg" alt="Paslon 3" class="candidate-photo">
                                <div class="candidate-name">Paslon 3</div>
                                <div class="candidate-team">Sendy & Rasyd</div>
                            </div>
                            <div class="candidate-body">
                                <table class="vision-mission-table">
                                    <tr>
                                        <th colspan="2">Visi</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Menjadi organisasi yang progresif dan berdaya saing dengan mengedepankan nilai-nilai kebersamaan dan kreativitas.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Misi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mengembangkan program unggulan berbasis minat anggota</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Membangun sistem kepengurusan yang efektif dan efisien</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Meningkatkan partisipasi anggota dalam setiap kegiatan</td>
                                    </tr>
                                </table>
                                <button type="button" class="btn btn-select" style="background: linear-gradient(135deg, #2ecc71, #27ae60);" onclick="selectCandidate('paslon 3', event)">
                                    Pilih Kandidat 3
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirmation Section -->
                <div id="confirmation-section" class="confirmation-section">
                    <h3>Konfirmasi Pilihan Anda</h3>
                    <p>Anda memilih: <strong id="selected-candidate-name"></strong></p>
                    <button type="submit" class="btn btn-confirm">
                        <i class="fas fa-check-circle"></i> Kirim Pilihan
                    </button>
                    <button type="button" class="btn btn-cancel" onclick="cancelSelection()">
                        <i class="fas fa-times-circle"></i> Batalkan Pilihan
                    </button>
                </div>
            </form>
        </div>

        <div class="voting-footer">
            <p>Suara Anda sangat berarti untuk kemajuan organisasi</p>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        // Select candidate function
        function selectCandidate(candidate, event) {
            if (event) {
                event.stopPropagation();
                event.preventDefault();
            }
            
            // Remove selected class from all candidates
            document.querySelectorAll('.candidate-card').forEach(card => {
                card.classList.remove('selected');
                const badge = card.querySelector('.selected-badge');
                if (badge) card.removeChild(badge);
            });
            
            // Add selected class to chosen candidate
            const selectedCard = document.getElementById(`candidate${candidate.split(' ')[1]}`);
            selectedCard.classList.add('selected');
            
            // Create selected badge
            const badge = document.createElement('div');
            badge.className = 'selected-badge';
            badge.innerHTML = '<i class="fas fa-check"></i> Dipilih';
            selectedCard.prepend(badge);
            
            // Set the hidden input value
            document.getElementById('pilihan').value = candidate;
            
            // Update confirmation section
            document.getElementById('selected-candidate-name').textContent = candidate.toUpperCase();
            document.getElementById('confirmation-section').style.display = 'block';
            
            // Scroll to confirmation section smoothly
            setTimeout(() => {
                document.getElementById('confirmation-section').scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 100);
        }
        
        // Cancel selection function
        function cancelSelection() {
            // Remove selected class from all candidates
            document.querySelectorAll('.candidate-card').forEach(card => {
                card.classList.remove('selected');
                const badge = card.querySelector('.selected-badge');
                if (badge) card.removeChild(badge);
            });
            
            // Clear the hidden input value
            document.getElementById('pilihan').value = '';
            
            // Hide confirmation section
            document.getElementById('confirmation-section').style.display = 'none';
        }
        
        // Form validation
        document.getElementById('votingForm').addEventListener('submit', function(e) {
            const selectedCandidate = document.getElementById('pilihan').value;
            const nama = document.getElementById('nama').value;
            const nim = document.getElementById('nim').value;
            const semester = document.getElementById('semester').value;
            
            if (!selectedCandidate) {
                e.preventDefault();
                alert('Silakan pilih salah satu kandidat terlebih dahulu');
                return;
            }
            
            if (!nama || !nim || !semester) {
                e.preventDefault();
                alert('Silakan lengkapi semua data diri Anda');
                return;
            }
            
            if (!confirm(`Apakah Anda yakin memilih ${selectedCandidate.toUpperCase()}? Pilihan tidak dapat diubah setelah dikirim.`)) {
                e.preventDefault();
            }
        });

        // Animation for form elements
        document.querySelectorAll('.form-control').forEach((input, index) => {
            input.style.opacity = '0';
            input.style.transform = 'translateY(20px)';
            input.style.transition = `all 0.3s ease ${index * 0.1}s`;
            
            setTimeout(() => {
                input.style.opacity = '1';
                input.style.transform = 'translateY(0)';
            }, 100);
        });
        
        // Animation for candidate cards
        document.querySelectorAll('.candidate-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `all 0.4s ease ${0.3 + index * 0.15}s`;
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 300 + index * 150);
        });
    </script>
</body>
</html>