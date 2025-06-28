<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Pemilihan Ketua Organisasi</title>
    <style>
        /* Global Styles */
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
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        p {
            margin-bottom: 1rem;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
        }

        a:hover {
            color: var(--secondary-color);
        }

        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: var(--secondary-color);
        }

        .btn-secondary {
            background-color: var(--gray-color);
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .btn-small {
            padding: 5px 10px;
            font-size: 0.9rem;
        }

        /* Header Styles */
        header {
            background-color: var(--dark-color);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        header h1 {
            color: white;
            font-size: 2.5rem;
        }

        header p {
            color: var(--light-gray);
        }

        .user-info {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 15px;
            margin-top: 1rem;
        }

        /* Footer Styles */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 1.5rem 0;
            margin-top: 2rem;
            text-align: center;
        }

        /* Admin Panel */
        .admin-nav {
            margin-bottom: 2rem;
        }

        .admin-nav ul {
            display: flex;
            list-style: none;
            border-bottom: 1px solid var(--light-gray);
        }

        .admin-nav li {
            margin-right: 1rem;
        }

        .admin-tab {
            padding: 10px 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            color: var(--gray-color);
            border-bottom: 3px solid transparent;
        }

        .admin-tab.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
            font-weight: bold;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-gray);
        }

        th {
            background-color: var(--dark-color);
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input, 
        .form-group textarea, 
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--light-gray);
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray-color);
        }

        .close-modal:hover {
            color: var(--dark-color);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .admin-nav ul {
                flex-wrap: wrap;
            }
            
            .admin-tab {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin Panel</h1>
            <p>Manajemen pemilihan ketua organisasi</p>
            <div class="user-info">
                <span>Admin: Panitia Pemilihan</span>
                <button id="logoutBtn" class="btn-small">Logout</button>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="admin-nav">
            <ul>
                <li><button class="admin-tab active" data-tab="candidates">Kelola Calon</button></li>
                <li><button class="admin-tab" data-tab="voters">Kelola Pemilih</button></li>
                <li><button class="admin-tab" data-tab="settings">Pengaturan</button></li>
                <li><button class="admin-tab" data-tab="results">Hasil</button></li>
            </ul>
        </section>
        
        <section class="admin-content">
            <!-- Tab Kelola Calon -->
            <div id="candidates-tab" class="tab-content active">
                <h2>Kelola Calon Ketua</h2>
                <button id="addCandidateBtn" class="btn">Tambah Calon Baru</button>
                
                <div class="candidates-list">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="adminCandidatesTable">
                            <!-- Daftar calon akan dimuat melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Form Tambah/Edit Calon -->
                <div id="candidateFormModal" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <h3 id="candidateFormTitle">Tambah Calon Baru</h3>
                        <form id="candidateForm">
                            <input type="hidden" id="candidateId">
                            <div class="form-group">
                                <label for="candidateName">Nama Calon</label>
                                <input type="text" id="candidateName" required>
                            </div>
                            <div class="form-group">
                                <label for="candidatePhoto">Foto Calon (URL)</label>
                                <input type="text" id="candidatePhoto" required>
                            </div>
                            <div class="form-group">
                                <label for="candidateVision">Visi</label>
                                <textarea id="candidateVision" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="candidateMission">Misi</label>
                                <textarea id="candidateMission" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Tab Kelola Pemilih -->
            <div id="voters-tab" class="tab-content">
                <h2>Kelola Daftar Pemilih</h2>
             
                <div class="search-box">
                    
                </div>
                
                <div class="voters-list">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status Memilih</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="adminVotersTable">
                            <!-- Daftar pemilih akan dimuat melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Form Tambah/Edit Pemilih -->
                <div id="voterFormModal" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <h3 id="voterFormTitle">Tambah Pemilih Baru</h3>
                        <form id="voterForm">
                            <input type="hidden" id="voterId">
                            <div class="form-group">
                                <label for="voterNim">NIM</label>
                                <input type="text" id="voterNim" required>
                            </div>
                            <div class="form-group">
                                <label for="voterName">Nama Lengkap</label>
                                <input type="text" id="voterName" required>
                            </div>
                            <div class="form-group">
                                <label for="voterPassword">Password</label>
                                <input type="password" id="voterPassword" required>
                            </div>
                            <button type="submit" class="btn">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Tab Pengaturan -->
            <div id="settings-tab" class="tab-content">
                <h2>Pengaturan Pemilihan</h2>
                <form id="electionSettings">
                    <div class="form-group">
                        <label for="electionTitle">Judul Pemilihan</label>
                        <input type="text" id="electionTitle" value="Pemilihan Ketua Organisasi 2024" required>
                    </div>
                    <div class="form-group">
                        <label for="electionStart">Waktu Mulai</label>
                        <input type="datetime-local" id="electionStart" required>
                    </div>
                    <div class="form-group">
                        <label for="electionEnd">Waktu Berakhir</label>
                        <input type="datetime-local" id="electionEnd" required>
                    </div>
                    <div class="form-group">
                        <label for="maxVoters">Jumlah Anggota</label>
                        <input type="number" id="maxVoters" value="250" required>
                    </div>
                    <div class="form-group checkbox-group">
                        <label>
                            <input type="checkbox" id="showResults"> Tampilkan hasil realtime kepada pemilih
                        </label>
                    </div>
                    <button type="submit" class="btn">Simpan Pengaturan</button>
                </form>
            </div>
            
            <!-- Tab Hasil -->
            <div id="results-tab" class="tab-content">
                <h2>Hasil Pemilihan</h2>
                <div class="admin-results-actions">
                    <button id="exportResults" class="btn">Ekspor ke Excel</button>
                    <button id="printResults" class="btn">Cetak Hasil</button>
                </div>
                
                <div class="detailed-results">
                    <h3>Detail Hasil</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Calon Ketua</th>
                                <th>Jumlah Suara</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody id="adminResultsTable">
                            <!-- Hasil akan dimuat melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Panitia Pemilihan Ketua Organisasi. All rights reserved.</p>
        </div>
    </footer>

    <script>
                      // Data Simulasi
let candidates = [
    {
        id: 1,
        name: "Dedi Mulyadi",
        photo: "image/1.jpeg",
        vision: "Organisasi yang inovatif dan kolaboratif",
        mission: [
            "Meningkatkan kualitas kegiatan organisasi",
            "Membangun jaringan dengan organisasi lain",
            "Mengadakan pelatihan untuk anggota",
            "Meningkatkan transparansi keuangan"
        ],
        votes: 0
    },
    {
        id: 2,
        name: "Pramono Anung",
        photo: "image/2.jpg",
        vision: "Organisasi yang berintegritas dan profesional",
        mission: [
            "Mengoptimalkan peran setiap divisi",
            "Mengadakan program pengembangan diri",
            "Meningkatkan partisipasi anggota",
            "Membangun sistem evaluasi kinerja"
        ],
        votes: 0
    },
    {
        id: 3,
        name: "Ahmad Lutfi",
        photo: "image/3.jpg",
        vision: "Organisasi yang progresif dan berdaya saing",
        mission: [
            "Mengadakan kompetisi internal",
            "Membangun branding organisasi",
            "Meningkatkan kualitas SDM",
            "Menggalang dana untuk kegiatan sosial"
        ],
        votes: 0
    }
]

        let voters = [
            { id: 1, nim: "422310089", name: "Sendy Ardiansyah", password: "123", hasVoted: false },
            { id: 2, nim: "422310087", name: "Rasyd", password: "1234", hasVoted: false },
            { id: 3, nim: "422310088", name: "Hamdi", password: "12345", hasVoted: false }
        ];

        let electionSettings = {
            title: "Pemilihan Ketua Organisasi 2024",
            startDate: "2024-06-15T08:00",
            endDate: "2024-06-15T16:00",
            maxVoters: 250,
            showResults: true
        };

        // DOM Elements
        const adminTabs = document.querySelectorAll('.admin-tab');
        const tabContents = document.querySelectorAll('.tab-content');
        const adminCandidatesTable = document.getElementById('adminCandidatesTable');
        const adminVotersTable = document.getElementById('adminVotersTable');
        const adminResultsTable = document.getElementById('adminResultsTable');
        const addCandidateBtn = document.getElementById('addCandidateBtn');
        const addVoterBtn = document.getElementById('addVoterBtn');
        const candidateFormModal = document.getElementById('candidateFormModal');
        const voterFormModal = document.getElementById('voterFormModal');
        const candidateForm = document.getElementById('candidateForm');
        const voterForm = document.getElementById('voterForm');
        const electionSettingsForm = document.getElementById('electionSettings');
        const logoutBtn = document.getElementById('logoutBtn');
        const closeModalBtns = document.querySelectorAll('.close-modal');

        // Initialize Admin Panel
        document.addEventListener('DOMContentLoaded', function() {
            // Load initial data
            renderAdminCandidates();
            renderAdminVoters();
            renderAdminResults();
            loadElectionSettings();

            // Setup tab navigation
            setupAdminTabs();

            // Event listeners for buttons
            if (addCandidateBtn) {
                addCandidateBtn.addEventListener('click', showCandidateForm);
            }

            if (addVoterBtn) {
                addVoterBtn.addEventListener('click', showVoterForm);
            }

            if (candidateForm) {
                candidateForm.addEventListener('submit', handleCandidateFormSubmit);
            }

            if (voterForm) {
                voterForm.addEventListener('submit', handleVoterFormSubmit);
            }

            if (electionSettingsForm) {
                electionSettingsForm.addEventListener('submit', handleElectionSettingsSubmit);
            }

            if (logoutBtn) {
                logoutBtn.addEventListener('click', handleLogout);
            }

            // Close modal buttons
            closeModalBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    if (modal) modal.style.display = 'none';
                });
            });

            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal')) {
                    event.target.style.display = 'none';
                }
            });
        });

        // Fungsi Logout
        function handleLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                sessionStorage.removeItem('adminLoggedIn');
                window.location.href = 'login';
            }
        }

        // Setup Admin Tabs
        function setupAdminTabs() {
            adminTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Update active tab
                    adminTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show corresponding content
                    tabContents.forEach(content => content.classList.remove('active'));
                    const contentEl = document.getElementById(`${tabId}-tab`);
                    if (contentEl) contentEl.classList.add('active');
                });
            });
        }

        // Render Candidates Table
        function renderAdminCandidates() {
            if (!adminCandidatesTable) return;
            
            adminCandidatesTable.innerHTML = '';
            
            candidates.forEach((candidate, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td><img src="${candidate.photo}" alt="${candidate.name}" style="width: 50px; height: 50px; object-fit: cover;"></td>
                    <td>${candidate.name}</td>
                    <td>${candidate.vision}</td>
                    <td><ul>${candidate.mission.map(m => `<li>${m}</li>`).join('')}</ul></td>
                    <td>
                        <button class="btn-small edit-candidate" data-id="${candidate.id}">Edit</button>
                        <button class="btn-small btn-secondary delete-candidate" data-id="${candidate.id}">Hapus</button>
                    </td>
                `;
                adminCandidatesTable.appendChild(row);
            });
            
            // Add event listeners to edit/delete buttons
            document.querySelectorAll('.edit-candidate').forEach(btn => {
                btn.addEventListener('click', function() {
                    const candidateId = parseInt(this.getAttribute('data-id'));
                    editCandidate(candidateId);
                });
            });
            
            document.querySelectorAll('.delete-candidate').forEach(btn => {
                btn.addEventListener('click', function() {
                    const candidateId = parseInt(this.getAttribute('data-id'));
                    if (confirm('Apakah Anda yakin ingin menghapus calon ini?')) {
                        deleteCandidate(candidateId);
                    }
                });
            });
        }

        // Render Voters Table
        function renderAdminVoters() {
            if (!adminVotersTable) return;
            
            adminVotersTable.innerHTML = '';
            
            voters.forEach((voter, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${voter.nim}</td>
                    <td>${voter.name}</td>
                    <td>${voter.hasVoted ? 'Sudah Memilih' : 'Belum Memilih'}</td>
                    <td>
                        <button class="btn-small edit-voter" data-id="${voter.id}">Edit</button>
                       
                    </td>
                `;
                adminVotersTable.appendChild(row);
            });
            
            // Add event listeners to edit/delete buttons
            document.querySelectorAll('.edit-voter').forEach(btn => {
                btn.addEventListener('click', function() {
                    const voterId = parseInt(this.getAttribute('data-id'));
                    editVoter(voterId);
                });
            });
            
            document.querySelectorAll('.delete-voter').forEach(btn => {
                btn.addEventListener('click', function() {
                    const voterId = parseInt(this.getAttribute('data-id'));
                    if (confirm('Apakah Anda yakin ingin menghapus pemilih ini?')) {
                        deleteVoter(voterId);
                    }
                });
            });
        }

        // Render Results Table
        function renderAdminResults() {
            if (!adminResultsTable) return;
            
            // Calculate total votes
            const totalVotes = candidates.reduce((sum, candidate) => sum + candidate.votes, 0);
            
            adminResultsTable.innerHTML = '';
            
            candidates.forEach((candidate, index) => {
                const percentage = totalVotes > 0 ? ((candidate.votes / totalVotes) * 100).toFixed(1) : 0;
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${candidate.name}</td>
                    <td>${candidate.votes}</td>
                    <td>${percentage}%</td>
                `;
                adminResultsTable.appendChild(row);
            });
        }

        // Load Election Settings
        function loadElectionSettings() {
            document.getElementById('electionTitle').value = electionSettings.title;
            document.getElementById('electionStart').value = electionSettings.startDate;
            document.getElementById('electionEnd').value = electionSettings.endDate;
            document.getElementById('maxVoters').value = electionSettings.maxVoters;
            document.getElementById('showResults').checked = electionSettings.showResults;
        }

        // Show Candidate Form
        function showCandidateForm() {
            document.getElementById('candidateFormTitle').textContent = 'Tambah Calon Baru';
            document.getElementById('candidateId').value = '';
            document.getElementById('candidateName').value = '';
            document.getElementById('candidatePhoto').value = '';
            document.getElementById('candidateVision').value = '';
            document.getElementById('candidateMission').value = '';
            candidateFormModal.style.display = 'block';
        }

        // Edit Candidate
        function editCandidate(id) {
            const candidate = candidates.find(c => c.id === id);
            if (!candidate) return;
            
            document.getElementById('candidateFormTitle').textContent = 'Edit Calon';
            document.getElementById('candidateId').value = candidate.id;
            document.getElementById('candidateName').value = candidate.name;
            document.getElementById('candidatePhoto').value = candidate.photo;
            document.getElementById('candidateVision').value = candidate.vision;
            document.getElementById('candidateMission').value = candidate.mission.join('\n');
            candidateFormModal.style.display = 'block';
        }

        // Handle Candidate Form Submit
        function handleCandidateFormSubmit(e) {
            e.preventDefault();
            
            const id = document.getElementById('candidateId').value ? parseInt(document.getElementById('candidateId').value) : 0;
            const name = document.getElementById('candidateName').value;
            const photo = document.getElementById('candidatePhoto').value;
            const vision = document.getElementById('candidateVision').value;
            const mission = document.getElementById('candidateMission').value.split('\n').filter(m => m.trim() !== '');
            
            if (!name || !photo || !vision || mission.length === 0) {
                alert('Semua field harus diisi!');
                return;
            }
            
            if (id) {
                // Update existing candidate
                const candidateIndex = candidates.findIndex(c => c.id === id);
                if (candidateIndex !== -1) {
                    candidates[candidateIndex] = {
                        ...candidates[candidateIndex],
                        name,
                        photo,
                        vision,
                        mission
                    };
                }
            } else {
                // Add new candidate
                const newId = candidates.length > 0 ? Math.max(...candidates.map(c => c.id)) + 1 : 1;
                candidates.push({
                    id: newId,
                    name,
                    photo,
                    vision,
                    mission,
                    votes: 0
                });
            }
            
            // Refresh candidates table
            renderAdminCandidates();
            renderAdminResults();
            
            // Close modal
            candidateFormModal.style.display = 'none';
        }

        // Delete Candidate
        function deleteCandidate(id) {
            candidates = candidates.filter(c => c.id !== id);
            renderAdminCandidates();
            renderAdminResults();
        }

        // Show Voter Form
        function showVoterForm() {
            document.getElementById('voterFormTitle').textContent = 'Tambah Pemilih Baru';
            document.getElementById('voterId').value = '';
            document.getElementById('voterNim').value = '';
            document.getElementById('voterName').value = '';
            document.getElementById('voterPassword').value = '';
            voterFormModal.style.display = 'block';
        }

        // Edit Voter
        function editVoter(id) {
            const voter = voters.find(v => v.id === id);
            if (!voter) return;
            
            document.getElementById('voterFormTitle').textContent = 'Edit Pemilih';
            document.getElementById('voterId').value = voter.id;
            document.getElementById('voterNim').value = voter.nim;
            document.getElementById('voterName').value = voter.name;
            document.getElementById('voterPassword').value = voter.password;
            voterFormModal.style.display = 'block';
        }

        // Handle Voter Form Submit
        function handleVoterFormSubmit(e) {
            e.preventDefault();
            
            const id = document.getElementById('voterId').value ? parseInt(document.getElementById('voterId').value) : 0;
            const nim = document.getElementById('voterNim').value;
            const name = document.getElementById('voterName').value;
            const password = document.getElementById('voterPassword').value;
            
            if (!nim || !name || !password) {
                alert('Semua field harus diisi!');
                return;
            }
            
            if (id) {
                // Update existing voter
                const voterIndex = voters.findIndex(v => v.id === id);
                if (voterIndex !== -1) {
                    voters[voterIndex] = {
                        ...voters[voterIndex],
                        nim,
                        name,
                        password
                    };
                }
            } else {
                // Add new voter
                const newId = voters.length > 0 ? Math.max(...voters.map(v => v.id)) + 1 : 1;
                voters.push({
                    id: newId,
                    nim,
                    name,
                    password,
                    hasVoted: false
                });
            }
            
            // Refresh voters table
            renderAdminVoters();
            
            // Close modal
            voterFormModal.style.display = 'none';
        }

        // Delete Voter
        function deleteVoter(id) {
            voters = voters.filter(v => v.id !== id);
            renderAdminVoters();
        }

        // Handle Election Settings Submit
        function handleElectionSettingsSubmit(e) {
            e.preventDefault();
            
            electionSettings = {
                title: document.getElementById('electionTitle').value,
                startDate: document.getElementById('electionStart').value,
                endDate: document.getElementById('electionEnd').value,
                maxVoters: parseInt(document.getElementById('maxVoters').value),
                showResults: document.getElementById('showResults').checked
            };
            
            alert('Pengaturan berhasil disimpan!');
        }
    </script>
</body>
</html>