const CSRF = window.APP.csrf;

let mejaData = [];

const statusLabel = { tersedia:'TERSEDIA', terisi:'TERISI', kotor:'KOTOR', dipesan:'DIPESAN' };
const statusClass = { tersedia:'badge-tersedia', terisi:'badge-terisi', kotor:'badge-kotor', dipesan:'badge-dipesan' };

function getActions(meja) {
  switch (meja.status) {
    case 'terisi':
    case 'dipesan':
      return `<button class="btn-act btn-orange" onclick="updateStatus(${meja.id},'kotor')">Kosongkan</button>`;
    case 'kotor':
      return `<button class="btn-act btn-orange" onclick="updateStatus(${meja.id},'tersedia')">Bersihkan</button>`;
    case 'tersedia':
      return `
        <button class="btn-act btn-outline" onclick="updateStatus(${meja.id},'dipesan')">Reservasi</button>
        <button class="btn-act btn-outline" onclick="updateStatus(${meja.id},'terisi')">Isi</button>`;
  }
}

function renderStrip() {
  const counts = { tersedia: 0, terisi: 0, kotor: 0, dipesan: 0 };
  mejaData.forEach(m => { if (counts[m.status] !== undefined) counts[m.status]++; });

  const stripConfig = [
    { key:'tersedia', label:'Tersedia', color:'#22C55E', bg:'#D1FAE5',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#22C55E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>` },
    { key:'terisi',   label:'Terisi',   color:'#EF4444', bg:'#FEE2E2',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#EF4444"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>` },
    { key:'kotor',    label:'Kotor',    color:'#6B7280', bg:'#F3F4F6',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#6B7280"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>` },
    { key:'dipesan',  label:'Dipesan',  color:'#3B82F6', bg:'#DBEAFE',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#3B82F6"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>` },
  ];

  document.getElementById('statStrip').innerHTML = stripConfig.map(s => `
    <div class="strip-card">
      <div class="strip-icon" style="background:${s.bg};">${s.icon}</div>
      <div>
        <div class="strip-label">${s.label}</div>
        <div class="strip-value" style="color:${s.color};">${String(counts[s.key]).padStart(2,'0')}</div>
      </div>
    </div>
  `).join('');
}

function renderTable(query = '') {
  const filtered = mejaData.filter(m =>
    m.nama.toLowerCase().includes(query.toLowerCase()) ||
    m.kode.toLowerCase().includes(query.toLowerCase()) ||
    m.zone.toLowerCase().includes(query.toLowerCase())
  );
  document.getElementById('mejaTableBody').innerHTML = filtered.map(m => `
    <tr>
      <td><span class="table-id">${m.kode}</span></td>
      <td><span class="table-name">${m.nama}</span></td>
      <td><span class="table-zone">${m.zone}</span></td>
      <td><span class="table-cap">${m.cap} Kursi</span></td>
      <td><span class="badge ${statusClass[m.status]}">${statusLabel[m.status]}</span></td>
      <td><div class="action-cell">${getActions(m)}</div></td>
    </tr>
  `).join('');
}

async function updateStatus(id, newStatus) {
  try {
    const res  = await fetch(`/kasir/meja/${id}/status`, {
      method:  'PATCH',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
      body:    JSON.stringify({ status: newStatus }),
    });
    const data = await res.json();
    if (data.success) {
      const meja = mejaData.find(m => m.id === id);
      if (meja) {
        meja.status = newStatus;
        renderStrip();
        renderTable(document.getElementById('searchMeja').value);
      }
    }
  } catch (err) {
    alert('Gagal mengubah status meja.');
    console.error(err);
  }
}

async function loadMejas() {
  const res  = await fetch('/kasir/mejas');
  mejaData   = await res.json();
  renderStrip();
  renderTable();
}

document.getElementById('searchMeja').addEventListener('input', e => renderTable(e.target.value));

/* tanggal dinamis */
(function () {
  const b = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d = new Date();
  document.getElementById('currentDate').textContent = d.getDate() + ' ' + b[d.getMonth()] + ' ' + d.getFullYear();
})();

/* ── INIT ── */
loadMejas();

/* expose ke global agar inline onclick di tabel bisa memanggil */
window.updateStatus = updateStatus;
