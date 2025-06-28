// Data Simulasi
let candidates = [
    {
        id: 1,
        name: "DYAH PERMAYSURI",
        photo: "assets/candidate1.jpg",
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
        name: "POCEL TEBET",
        photo: "assets/candidate2.jpg",
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
        name: "BOBBY MANALU",
        photo: "assets/candidate3.jpg",
        vision: "Organisasi yang progresif dan berdaya saing",
        mission: [
            "Mengadakan kompetisi internal",
            "Membangun branding organisasi",
            "Meningkatkan kualitas SDM",
            "Menggalang dana untuk kegiatan sosial"
        ],
        votes: 0
    }
];

let voters = [
    { nim: "12345678", name: "John Doe", password: "password123", hasVoted: false },
    { nim: "87654321", name: "Jane Smith", password: "password123", hasVoted: false },
    { nim: "11223344", name: "Bob Johnson", password: "password123", hasVoted: false }
];

let electionSettings = {
    title: "Pemilihan Ketua Organisasi 2024",
    startDate: new Date("2024-06-15T08:00:00"),
    endDate: new Date("2024-06-15T16:00:00"),
    maxVoters: 250,
    showResults: true
};

let currentUser = null;
let selectedCandidateId = null;

// DOM Elements
const loginForm = document.getElementById('loginForm');
const loginError = document.getElementById('loginError');
const candidatesContainer = document.getElementById('candidatesContainer');
const confirmationModal = document.getElementById('confirmationModal');
const thankYouModal = document.getElementById('thankYouModal');
const confirmationText = document.getElementById('confirmationText');
const confirmVoteBtn = document.getElementById('confirmVote');
const cancelVoteBtn = document.getElementById('cancelVote');
const viewResultsBtn = document.getElementById('viewResults');
const logoutBtn = document.getElementById('logoutBtn');
const backToVoteBtn = document.getElementById('backToVote');
const closeModalBtns = document.querySelectorAll('.close-modal');
const countdownTimer = document.getElementById('countdown-timer');
const daysEl = document.getElementById('days');
const hoursEl = document.getElementById('hours');
const minutesEl = document.getElementById('minutes');
const secondsEl = document.getElementById('seconds');

// Admin Elements
const adminTabs = document.querySelectorAll('.admin-tab');
const tabContents = document.querySelectorAll('.tab-content');
const adminCandidatesTable = document.getElementById('adminCandidatesTable');
const addCandidateBtn = document.getElementById('addCandidateBtn');
const candidateFormModal = document.getElementById('candidateFormModal');
const candidateForm = document.getElementById('candidateForm');
const candidateFormTitle = document.getElementById('candidateFormTitle');
const candidateIdInput = document.getElementById('candidateId');
const candidateNameInput = document.getElementById('candidateName');
const candidatePhotoInput = document.getElementById('candidatePhoto');
const candidateVisionInput = document.getElementById('candidateVision');
const candidateMissionInput = document.getElementById('candidateMission');

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    // Initialize based on current page
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    
    if (currentPage === 'index.html') {
        // Home page
        if (countdownTimer) {
            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
    } else if (currentPage === 'login.html') {
        // Login page
        if (loginForm) {
            loginForm.addEventListener('submit', handleLogin);
        }
    } else if (currentPage === 'voting.html') {
        // Voting page
        if (candidatesContainer) {
            renderCandidates();
        }
        
        if (logoutBtn) {
            logoutBtn.addEventListener('click', handleLogout);
        }
        
        // Check if user is logged in
        if (!currentUser) {
            // Simulate login for demo
            currentUser = voters[0];
            updateUserInfo();
        }
    } else if (currentPage === 'results.html') {
        // Results page
        renderResults();
        
        if (backToVoteBtn) {
            backToVoteBtn.addEventListener('click', function() {
                window.location.href = 'voting.html';
            });
        }
    } else if (currentPage === 'admin.html') {
        // Admin page
        setupAdminTabs();
        renderAdminCandidates();
        
        if (addCandidateBtn) {
            addCandidateBtn.addEventListener('click', function() {
                showCandidateForm();
            });
        }
        
        if (candidateForm) {
            candidateForm.addEventListener('submit', handleCandidateFormSubmit);
        }
        
        // Close modal buttons
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                candidateFormModal.style.display = 'none';
            });
        });
    }
    
    // Modal close buttons
    if (closeModalBtns) {
        closeModalBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) modal.style.display = 'none';
            });
        });
    }
    
    if (confirmVoteBtn) {
        confirmVoteBtn.addEventListener('click', handleVoteConfirmation);
    }
    
    if (cancelVoteBtn) {
        cancelVoteBtn.addEventListener('click', function() {
            if (confirmationModal) confirmationModal.style.display = 'none';
        });
    }
    
    if (viewResultsBtn) {
        viewResultsBtn.addEventListener('click', function() {
            if (thankYouModal) thankYouModal.style.display = 'none';
            window.location.href = 'results.html';
        });
    }
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
});

// Functions
function updateCountdown() {
    const now = new Date();
    const electionStart = electionSettings.startDate;
    const diff = electionStart - now;
    
    if (diff <= 0) {
        if (countdownTimer) {
            countdownTimer.innerHTML = '<div>Pemilihan telah dimulai!</div>';
        }
        return;
    }
    
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);
    
    if (daysEl) daysEl.textContent = days.toString().padStart(2, '0');
    if (hoursEl) hoursEl.textContent = hours.toString().padStart(2, '0');
    if (minutesEl) minutesEl.textContent = minutes.toString().padStart(2, '0');
    if (secondsEl) secondsEl.textContent = seconds.toString().padStart(2, '0');
}

function handleLogin(e) {
    e.preventDefault();
    
    const nim = document.getElementById('nim')?.value;
    const password = document.getElementById('password')?.value;
    
    if (!nim || !password) {
        showError('NIM dan password harus diisi');
        return;
    }
    
    // Find voter
    const voter = voters.find(v => v.nim === nim && v.password === password);
    
    if (voter) {
        if (voter.hasVoted) {
            showError('Anda sudah melakukan voting sebelumnya.');
        } else {
            currentUser = voter;
            window.location.href = 'voting.html';
        }
    } else {
        showError('NIM atau password salah.');
    }
}

function showError(message) {
    if (loginError) {
        loginError.textContent = message;
        loginError.style.display = 'block';
    }
}

function renderCandidates() {
    if (!candidatesContainer) return;
    
    candidatesContainer.innerHTML = '';
    
    candidates.forEach(candidate => {
        const missionList = candidate.mission.map(m => `<li>${m}</li>`).join('');
        
        const candidateCard = document.createElement('div');
        candidateCard.className = 'candidate-card';
        candidateCard.innerHTML = `
            <img src="${candidate.photo}" alt="${candidate.name}" class="candidate-photo">
            <div class="candidate-info">
                <h3 class="candidate-name">${candidate.name}</h3>
                <p class="candidate-vision">"${candidate.vision}"</p>
                <div class="candidate-mission">
                    <h4>Misi:</h4>
                    <ul>${missionList}</ul>
                </div>
                <button class="btn select-candidate" data-id="${candidate.id}">Pilih Kandidat</button>
            </div>
        `;
        
        candidatesContainer.appendChild(candidateCard);
    });
    
    // Add event listeners to select buttons
    document.querySelectorAll('.select-candidate').forEach(btn => {
        btn.addEventListener('click', function() {
            selectedCandidateId = parseInt(this.getAttribute('data-id'));
            showConfirmationModal(selectedCandidateId);
        });
    });
}

function showConfirmationModal(candidateId) {
    const candidate = candidates.find(c => c.id === candidateId);
    if (!candidate || !confirmationText || !confirmationModal) return;
    
    confirmationText.textContent = `Anda akan memilih ${candidate.name} sebagai ketua organisasi. Pilihan ini tidak dapat diubah setelah dikonfirmasi.`;
    confirmationModal.style.display = 'block';
}

function handleVoteConfirmation() {
    if (!selectedCandidateId || !currentUser) return;
    
    // Record vote
    const candidate = candidates.find(c => c.id === selectedCandidateId);
    if (candidate) candidate.votes++;
    
    // Mark voter as voted
    const voter = voters.find(v => v.nim === currentUser.nim);
    if (voter) voter.hasVoted = true;
    
    // Close confirmation modal
    if (confirmationModal) confirmationModal.style.display = 'none';
    
    // Show thank you modal
    if (thankYouModal) thankYouModal.style.display = 'block';
}

function handleLogout() {
    currentUser = null;
    window.location.href = 'index.html';
}

function updateUserInfo() {
    if (currentUser && document.getElementById('loggedInUser')) {
        document.getElementById('loggedInUser').textContent = `NIM: ${currentUser.nim}`;
    }
}

function renderResults() {
    // Calculate total votes
    const totalVotes = candidates.reduce((sum, candidate) => sum + candidate.votes, 0);
    
    // Update total voters
    const totalVotersEl = document.getElementById('totalVoters');
    if (totalVotersEl) {
        totalVotersEl.textContent = voters.filter(v => v.hasVoted).length;
    }
    
    // Update participation progress
    const participationProgressEl = document.getElementById('participationProgress');
    if (participationProgressEl) {
        const participation = (voters.filter(v => v.hasVoted).length / electionSettings.maxVoters) * 100;
        participationProgressEl.style.width = `${participation}%`;
    }
    
    // Update results table
    const resultsTableBody = document.getElementById('resultsTableBody');
    if (resultsTableBody) {
        resultsTableBody.innerHTML = '';
        
        candidates.forEach((candidate, index) => {
            const percentage = totalVotes > 0 ? ((candidate.votes / totalVotes) * 100).toFixed(1) : 0;
            
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${candidate.name}</td>
                <td>${candidate.votes}</td>
                <td>${percentage}%</td>
            `;
            resultsTableBody.appendChild(row);
        });
    }
    
    // Render chart
    renderResultsChart();
}

function renderResultsChart() {
    const ctx = document.getElementById('resultsChart')?.getContext('2d');
    if (!ctx) return;
    
    const candidateNames = candidates.map(c => c.name);
    const votes = candidates.map(c => c.votes);
    const backgroundColors = ['#3498db', '#2ecc71', '#e74c3c', '#f39c12', '#9b59b6'];
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: candidateNames,
            datasets: [{
                label: 'Jumlah Suara',
                data: votes,
                backgroundColor: backgroundColors,
                borderColor: backgroundColors.map(c => c.replace('0.8', '1')),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Hasil Pemilihan Sementara',
                    font: {
                        size: 18
                    }
                }
            }
        }
    });
}

// Admin Functions
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

function showCandidateForm() {
    if (!candidateFormTitle || !candidateFormModal) return;
    
    candidateFormTitle.textContent = 'Tambah Calon Baru';
    candidateIdInput.value = '';
    candidateNameInput.value = '';
    candidatePhotoInput.value = '';
    candidateVisionInput.value = '';
    candidateMissionInput.value = '';
    candidateFormModal.style.display = 'block';
}

function editCandidate(id) {
    const candidate = candidates.find(c => c.id === id);
    if (!candidate || !candidateFormTitle || !candidateFormModal) return;
    
    candidateFormTitle.textContent = 'Edit Calon';
    candidateIdInput.value = candidate.id;
    candidateNameInput.value = candidate.name;
    candidatePhotoInput.value = candidate.photo;
    candidateVisionInput.value = candidate.vision;
    candidateMissionInput.value = candidate.mission.join('\n');
    candidateFormModal.style.display = 'block';
}

function handleCandidateFormSubmit(e) {
    e.preventDefault();
    
    const id = candidateIdInput.value ? parseInt(candidateIdInput.value) : 0;
    const name = candidateNameInput.value;
    const photo = candidatePhotoInput.value;
    const vision = candidateVisionInput.value;
    const mission = candidateMissionInput.value.split('\n').filter(m => m.trim() !== '');
    
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
    
    // Close modal
    if (candidateFormModal) candidateFormModal.style.display = 'none';
}

function deleteCandidate(id) {
    candidates = candidates.filter(c => c.id !== id);
    renderAdminCandidates();
}

// Initialize admin tabs if on admin page
if (window.location.pathname.split('/').pop() === 'admin.html' && adminTabs.length > 0) {
    adminTabs[0].click();
}