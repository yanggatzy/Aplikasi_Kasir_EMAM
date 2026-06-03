const mejaData = [
  { id:'T-01', name:'Meja 01', zone:'INDOOR',  cap:4, status:'terisi'   },
  { id:'T-02', name:'Meja 02', zone:'INDOOR',  cap:2, status:'tersedia' },
  { id:'T-03', name:'Meja 03', zone:'OUTDOOR', cap:6, status:'dipesan'  },
  { id:'T-04', name:'Meja 04', zone:'INDOOR',  cap:8, status:'tersedia' },
  { id:'T-05', name:'Meja 05', zone:'OUTDOOR', cap:4, status:'dipesan'  },
  { id:'T-06', name:'Meja 06', zone:'INDOOR',  cap:4, status:'tersedia' },
  { id:'T-07', name:'Meja 07', zone:'INDOOR',  cap:6, status:'terisi'   },
  { id:'T-08', name:'Meja 08', zone:'OUTDOOR', cap:2, status:'tersedia' },
  { id:'T-09', name:'Meja 09', zone:'INDOOR',  cap:4, status:'kotor'    },
  { id:'T-10', name:'Meja 10', zone:'OUTDOOR', cap:2, status:'tersedia' },
  { id:'T-11', name:'Meja 11', zone:'INDOOR',  cap:4, status:'terisi'   },
  { id:'T-12', name:'Meja 12', zone:'INDOOR',  cap:4, status:'dipesan'  },
  { id:'T-13', name:'Meja 13', zone:'OUTDOOR', cap:6, status:'tersedia' },
  { id:'T-14', name:'Meja 14', zone:'INDOOR',  cap:2, status:'tersedia' },
  { id:'T-15', name:'Meja 15', zone:'INDOOR',  cap:4, status:'terisi'   },
  { id:'T-16', name:'Meja 16', zone:'OUTDOOR', cap:8, status:'dipesan'  },
  { id:'T-17', name:'Meja 17', zone:'INDOOR',  cap:4, status:'tersedia' },
  { id:'T-18', name:'Meja 18', zone:'INDOOR',  cap:4, status:'kotor'    },
  { id:'T-19', name:'Meja 19', zone:'OUTDOOR', cap:2, status:'tersedia' },
  { id:'T-20', name:'Meja 20', zone:'INDOOR',  cap:6, status:'terisi'   },
  { id:'T-21', name:'Meja 21', zone:'INDOOR',  cap:4, status:'tersedia' },
  { id:'T-22', name:'Meja 22', zone:'OUTDOOR', cap:4, status:'dipesan'  },
  { id:'T-23', name:'Meja 23', zone:'INDOOR',  cap:2, status:'tersedia' },
  { id:'T-24', name:'Meja 24', zone:'INDOOR',  cap:8, status:'terisi'   },
  { id:'T-25', name:'Meja 25', zone:'OUTDOOR', cap:4, status:'tersedia' },
  { id:'T-26', name:'Meja 26', zone:'INDOOR',  cap:4, status:'kotor'    },
  { id:'T-27', name:'Meja 27', zone:'INDOOR',  cap:2, status:'tersedia' },
  { id:'T-28', name:'Meja 28', zone:'OUTDOOR', cap:6, status:'dipesan'  },
];

const statusLabel = { tersedia:'TERSEDIA', terisi:'TERISI', kotor:'KOTOR', dipesan:'DIPESAN' };
const statusClass = { tersedia:'badge-tersedia', terisi:'badge-terisi', kotor:'badge-kotor', dipesan:'badge-dipesan' };

function getActions(meja) {
  switch (meja.status) {
    case 'terisi':   return `<button class="btn-act btn-orange" onclick="updateStatus('${meja.id}','kotor')">Kosongkan</button>`;
    case 'kotor':    return `<button class="btn-act btn-orange" onclick="updateStatus('${meja.id}','tersedia')">Bersihkan</button>`;
    case 'dipesan':  return `<button class="btn-act btn-orange" onclick="updateStatus('${meja.id}','kotor')">Kosongkan</button>`;
    case 'tersedia': return `
      <button class="btn-act btn-outline" onclick="updateStatus('${meja.id}','dipesan')">Reservasi</button>
      <button class="btn-act btn-outline" onclick="updateStatus('${meja.id}','terisi')">Isi</button>`;
  }
}

function renderStrip() {
  const counts = { tersedia: 0, terisi: 0, kotor: 0, dipesan: 0 };
  mejaData.forEach(m => counts[m.status]++);

  const stripConfig = [
    { key:'tersedia', label:'Tersedia', color:'#22C55E', bg:'#D1FAE5',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#22C55E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>` },
    { key:'terisi',  label:'Terisi',   color:'#EF4444', bg:'#FEE2E2',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#EF4444"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>` },
    { key:'kotor',   label:'Kotor',    color:'#6B7280', bg:'#F3F4F6',
      icon:`<svg width="18" height="18" viewBox="0 0 24 24" fill="#6B7280"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>` },
    { key:'dipesan', label:'Dipesan',  color:'#3B82F6', bg:'#DBEAFE',
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
    m.name.toLowerCase().includes(query.toLowerCase()) ||
    m.id.toLowerCase().includes(query.toLowerCase()) ||
    m.zone.toLowerCase().includes(query.toLowerCase())
  );
  document.getElementById('mejaTableBody').innerHTML = filtered.map(m => `
    <tr>
      <td><span class="table-id">${m.id}</span></td>
      <td><span class="table-name">${m.name}</span></td>
      <td><span class="table-zone">${m.zone}</span></td>
      <td><span class="table-cap">${m.cap} Kursi</span></td>
      <td><span class="badge ${statusClass[m.status]}">${statusLabel[m.status]}</span></td>
      <td><div class="action-cell">${getActions(m)}</div></td>
    </tr>
  `).join('');
}

function updateStatus(id, newStatus) {
  const meja = mejaData.find(m => m.id === id);
  if (meja) { meja.status = newStatus; renderStrip(); renderTable(document.getElementById('searchMeja').value); }
}

document.getElementById('searchMeja').addEventListener('input', e => renderTable(e.target.value));

/* tanggal dinamis */
(function(){
  const b=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d=new Date();
  document.getElementById('currentDate').textContent=d.getDate()+' '+b[d.getMonth()]+' '+d.getFullYear();
})();

renderStrip();
renderTable();

/* ── HANDLE REDIRECT DARI KASIR (meja + action) ── */
(function() {
  const params = new URLSearchParams(window.location.search);
  const targetMeja   = params.get('meja');
  const targetAction = params.get('action');
  if (!targetMeja || !targetAction) return;

  const meja = mejaData.find(m => m.id === targetMeja);
  if (!meja) return;

  meja.status = targetAction;
  renderStrip();
  renderTable();

  setTimeout(() => {
    const rows = document.querySelectorAll('#mejaTableBody tr');
    for (const row of rows) {
      if (row.querySelector('.table-id')?.textContent === targetMeja) {
        row.scrollIntoView({ behavior: 'smooth', block: 'center' });
        row.style.outline = '2px solid #D35400';
        row.style.borderRadius = '6px';
        setTimeout(() => { row.style.outline = ''; }, 2500);
        break;
      }
    }
  }, 100);
})();
