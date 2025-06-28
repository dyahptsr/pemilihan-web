<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Voting | Sistem Pemilihan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #adb5bd;
            --paslon1: #7209b7;
            --paslon2: #f72585;
            --paslon3: #3a86ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.6s cubic-bezier(0.39, 0.575, 0.565, 1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        }

        .header-content h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .header-content p {
            opacity: 0.9;
            font-weight: 300;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background-color: white;
            color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--light);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-refresh {
            background-color: rgba(255,255,255,0.2);
            color: white;
        }

        .btn-refresh:hover {
            background-color: rgba(255,255,255,0.3);
            transform: rotate(180deg);
        }

        .btn-logout {
            background-color: rgba(255,255,255,0.15);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-logout:hover {
            background-color: rgba(255,255,255,0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-logout i {
            transition: transform 0.3s ease;
        }

        .btn-logout:hover i {
            transform: translateX(3px);
        }

        /* Statistics Section */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1.5rem 2rem;
            background: #f8f9fa;
            border-bottom: 1px solid #eee;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.paslon1 {
            border-top: 4px solid var(--paslon1);
        }

        .stat-card.paslon2 {
            border-top: 4px solid var(--paslon2);
        }

        .stat-card.paslon3 {
            border-top: 4px solid var(--paslon3);
        }

        .stat-title {
            font-size: 1rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-percentage {
            display: inline-block;
            padding: 0.3rem 0.6rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .paslon1 .stat-value {
            color: var(--paslon1);
        }

        .paslon2 .stat-value {
            color: var(--paslon2);
        }

        .paslon3 .stat-value {
            color: var(--paslon3);
        }

        .progress-container {
            margin-top: 1rem;
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            transition: width 1s ease;
        }

        .paslon1 .progress-bar {
            background: var(--paslon1);
        }

        .paslon2 .progress-bar {
            background: var(--paslon2);
        }

        .paslon3 .progress-bar {
            background: var(--paslon3);
        }

        .table-container {
            padding: 1.5rem 2rem;
            position: relative;
        }

        .table-tools {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            flex-grow: 1;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 0.7rem 1rem 0.7rem 2.5rem;
            border: 1px solid var(--gray);
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid var(--gray);
            background: white;
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
            animation: slideIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        th {
            background-color: var(--primary);
            color: white;
            position: sticky;
            top: 0;
            padding: 1rem 1.2rem;
            font-weight: 500;
            text-align: left;
        }

        th:first-child {
            border-top-left-radius: 8px;
        }

        th:last-child {
            border-top-right-radius: 8px;
        }

        td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #eee;
            background: white;
            transition: all 0.3s;
        }

        tr:hover td {
            background-color: #f8f9ff;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .pilihan-tag {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-align: center;
            min-width: 80px;
        }

        .paslon-1 {
            background-color: var(--paslon1);
            color: white;
        }

        .paslon-2 {
            background-color: var(--paslon2);
            color: white;
        }

        .paslon-3 {
            background-color: var(--paslon3);
            color: white;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            color: white;
        }

        .edit-btn {
            background-color: var(--warning);
        }

        .edit-btn:hover {
            background-color: #e67e22;
            transform: translateY(-2px);
        }

        .delete-btn {
            background-color: var(--danger);
        }

        .delete-btn:hover {
            background-color: #d91a6a;
            transform: translateY(-2px);
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 2rem;
            background-color: #f8f9fa;
            border-top: 1px solid #eee;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
            border: 1px solid #ddd;
        }

        .page-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .page-btn:hover:not(.active) {
            background-color: #f1f1f1;
        }

        .entries-info {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Floating particles background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            animation: floatParticle linear infinite;
        }

        @keyframes floatParticle {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(-100vh) rotate(360deg); }
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.5rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .table-tools {
                flex-direction: column;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            th, td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
            
            .footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Floating particles background -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="header">
            <div class="header-content">
                <h1><i class="fas fa-vote-yea"></i> Data Voting</h1>
                <p>Daftar lengkap hasil pemilihan ketua organisasi</p>
            </div>
            <div class="header-actions">
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Statistics Section -->
        <div class="stats-container">
            <div class="stat-card paslon1">
                <div class="stat-title">
                    <i class="fas fa-user-tie"></i> Paslon 1
                </div>
                <div class="stat-value" id="paslon1-count">0</div>
                <div class="progress-container">
                    <div class="progress-bar" id="paslon1-progress" style="width: 0%"></div>
                </div>
                <div class="stat-percentage" id="paslon1-percentage">0%</div>
            </div>
            
            <div class="stat-card paslon2">
                <div class="stat-title">
                    <i class="fas fa-user-tie"></i> Paslon 2
                </div>
                <div class="stat-value" id="paslon2-count">0</div>
                <div class="progress-container">
                    <div class="progress-bar" id="paslon2-progress" style="width: 0%"></div>
                </div>
                <div class="stat-percentage" id="paslon2-percentage">0%</div>
            </div>
            
            <div class="stat-card paslon3">
                <div class="stat-title">
                    <i class="fas fa-user-tie"></i> Paslon 3
                </div>
                <div class="stat-value" id="paslon3-count">0</div>
                <div class="progress-container">
                    <div class="progress-bar" id="paslon3-progress" style="width: 0%"></div>
                </div>
                <div class="stat-percentage" id="paslon3-percentage">0%</div>
            </div>
        </div>
        
        <div class="table-container">
            <div class="table-tools">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari data voting..." id="searchInput">
                </div>
                <div class="filter-buttons">
                    <div class="filter-btn active">Semua</div>
                    <div class="filter-btn">Paslon 1</div>
                    <div class="filter-btn">Paslon 2</div>
                    <div class="filter-btn">Paslon 3</div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>Pilihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="votingTableBody">
                    @if(count($voting) > 0)
                        @foreach($voting as $v)
                        <tr>
                            <td>{{$v->nama}}</td>
                            <td>{{$v->nim}}</td>
                            <td>Semester {{$v->semester}}</td>
                            <td>
                                <span class="pilihan-tag paslon-{{ substr($v->pilihan, -1) }}">
                                    <i class="fas fa-user-tie"></i> {{$v->pilihan}}
                                </span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="/voting/edit/{{$v->id_voting}}" class="action-btn edit-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/voting/hapus/{{$v->id_voting}}" class="action-btn delete-btn" title="Hapus" onclick="return confirmDelete()">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="empty-state">
                                <i class="fas fa-box-open"></i>
                                <h3>Data voting belum tersedia</h3>
                                <p>Belum ada data yang tercatat dalam sistem</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="footer">
            <div class="entries-info">
                Menampilkan 1 sampai {{count($voting)}} dari {{count($voting)}} entri
            </div>
            <div class="pagination">
                <div class="page-btn"><i class="fas fa-angle-left"></i></div>
                <div class="page-btn active">1</div>
                <div class="page-btn"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 5px and 15px
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.bottom = `-${size}px`;
                
                // Random animation duration (10s to 20s) and delay
                const duration = Math.random() * 10 + 10;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Calculate and update statistics
        function updateStatistics() {
            const rows = document.querySelectorAll('#votingTableBody tr:not(.empty-state)');
            let paslon1Count = 0;
            let paslon2Count = 0;
            let paslon3Count = 0;
            
            rows.forEach(row => {
                const pilihanTag = row.querySelector('.pilihan-tag');
                if (pilihanTag) {
                    if (pilihanTag.classList.contains('paslon-1')) paslon1Count++;
                    else if (pilihanTag.classList.contains('paslon-2')) paslon2Count++;
                    else if (pilihanTag.classList.contains('paslon-3')) paslon3Count++;
                }
            });
            
            const totalVotes = paslon1Count + paslon2Count + paslon3Count;
            
            // Update counts
            document.getElementById('paslon1-count').textContent = paslon1Count;
            document.getElementById('paslon2-count').textContent = paslon2Count;
            document.getElementById('paslon3-count').textContent = paslon3Count;
            
            // Calculate percentages
            const paslon1Percentage = totalVotes > 0 ? Math.round((paslon1Count / totalVotes) * 100) : 0;
            const paslon2Percentage = totalVotes > 0 ? Math.round((paslon2Count / totalVotes) * 100) : 0;
            const paslon3Percentage = totalVotes > 0 ? Math.round((paslon3Count / totalVotes) * 100) : 0;
            
            // Update progress bars and percentages
            document.getElementById('paslon1-progress').style.width = `${paslon1Percentage}%`;
            document.getElementById('paslon2-progress').style.width = `${paslon2Percentage}%`;
            document.getElementById('paslon3-progress').style.width = `${paslon3Percentage}%`;
            
            document.getElementById('paslon1-percentage').textContent = `${paslon1Percentage}%`;
            document.getElementById('paslon2-percentage').textContent = `${paslon2Percentage}%`;
            document.getElementById('paslon3-percentage').textContent = `${paslon3Percentage}%`;
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#votingTableBody tr');
            
            rows.forEach(row => {
                if (row.querySelector('.empty-state')) return;
                
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
            
            // Update statistics after search
            updateStatistics();
        });

        // Filter buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const filterValue = this.textContent.toLowerCase();
                const rows = document.querySelectorAll('#votingTableBody tr');
                
                rows.forEach(row => {
                    if (row.querySelector('.empty-state')) return;
                    
                    if (filterValue === 'semua') {
                        row.style.display = '';
                    } else {
                        const pilihan = row.querySelector('.pilihan-tag').textContent.toLowerCase();
                        row.style.display = pilihan.includes(filterValue) ? '' : 'none';
                    }
                });
                
                // Update statistics after filtering
                updateStatistics();
            });
        });

        // Delete confirmation
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }

        // Initialize particles and statistics
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            updateStatistics();
        });
    </script>
</body>
</html>