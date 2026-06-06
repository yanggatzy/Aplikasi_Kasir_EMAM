const IMG_FALLBACK = window.APP.imgFallback;

let allMenus    = [];
let kategoris   = [];
let activeKat   = 'semua';

/* ── INIT ── */
async function init() {
  renderSkeletons();
  await Promise.all([loadMenus(), loadTerlaris()]);
  startClock();
  setInterval(refreshData, 5 * 60 * 1000); // auto-refresh tiap 5 menit
}

/* ── LOAD DATA ── */
async function loadMenus() {
  const res  = await fetch('/menu/data');
  const data = await res.json();
  kategoris  = data.kategoris;
  allMenus   = data.menus;
  renderTabs();
  renderMenus();
}

async function loadTerlaris() {
  const res  = await fetch('/menu/terlaris');
  const list = await res.json();
  renderTerlaris(list);
}

async function refreshData() {
  await Promise.all([loadMenus(), loadTerlaris()]);
}

/* ── TABS ── */
function renderTabs() {
  const bar = document.getElementById('tabsBar');
  const semua = `<button class="tab-btn ${activeKat === 'semua' ? 'active' : ''}" data-kat="semua" onclick="setTab('semua', this)">Semua Menu</button>`;
  const cats  = kategoris.map(k =>
    `<button class="tab-btn ${activeKat === String(k.id) ? 'active' : ''}" data-kat="${k.id}" onclick="setTab('${k.id}', this)">${k.nama_kategori}</button>`
  ).join('');
  bar.innerHTML = semua + cats;
}

function setTab(kat, el) {
  activeKat = String(kat);
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  el.classList.add('active');
  renderMenus();
  // scroll tab ke posisi visible
  el.scrollIntoView({ block: 'nearest', inline: 'center', behavior: 'smooth' });
}

/* ── MENU GRID ── */
function renderMenus() {
  const grid = document.getElementById('menuGrid');
  const filtered = activeKat === 'semua'
    ? allMenus
    : allMenus.filter(m => String(m.id_kategori) === activeKat);

  if (!filtered.length) {
    grid.innerHTML = `<div class="empty-state">Tidak ada menu di kategori ini.</div>`;
    return;
  }

  grid.innerHTML = filtered.map(m => `
    <div class="menu-card">
      <div class="menu-card-img-wrap">
        <img class="menu-card-img" src="${m.gambar ? '/storage/' + m.gambar : IMG_FALLBACK}" alt="${esc(m.nama_menu)}" loading="lazy">
      </div>
      <div class="menu-card-body">
        <div class="menu-card-name">${esc(m.nama_menu)}</div>
        <div class="menu-card-price">Rp ${fmtRp(m.harga)}</div>
      </div>
    </div>
  `).join('');
}

/* ── SKELETON ── */
function renderSkeletons() {
  const grid = document.getElementById('menuGrid');
  grid.innerHTML = Array.from({ length: 12 }, () => `
    <div class="menu-card menu-card-skeleton">
      <div class="menu-card-img-wrap skeleton"></div>
      <div class="menu-card-body">
        <div class="sk-name skeleton"></div>
        <div class="sk-price skeleton"></div>
      </div>
    </div>
  `).join('');
}

/* ── TERLARIS SIDEBAR ── */
function renderTerlaris(list) {
  const el = document.getElementById('terlarisList');
  if (!list.length) {
    el.innerHTML = `<div style="padding:20px;text-align:center;font-size:13px;color:#999;">Belum ada data</div>`;
    return;
  }
  el.innerHTML = list.map(m => `
    <div class="terlaris-item">
      <div class="terlaris-img-wrap">
        <img class="terlaris-img" src="${m.gambar ? '/storage/' + m.gambar : IMG_FALLBACK}" alt="${esc(m.nama_menu)}" loading="lazy">
      </div>
      <div class="terlaris-info">
        <div class="terlaris-name">${esc(m.nama_menu)}</div>
        <div class="terlaris-price">Rp ${fmtRp(m.harga)}</div>
        ${m.total_terjual > 0 ? `<div class="terlaris-count">${m.total_terjual}+ Terjual</div>` : ''}
      </div>
    </div>
  `).join('');
}

/* ── CLOCK ── */
function startClock() {
  const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const hari  = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  function tick() {
    const d  = new Date();
    const hh = String(d.getHours()).padStart(2,'0');
    const mm = String(d.getMinutes()).padStart(2,'0');
    document.getElementById('clockTime').textContent = `${hh}:${mm}`;
    document.getElementById('clockDate').textContent =
      `${hari[d.getDay()]}, ${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;
  }
  tick();
  setInterval(tick, 1000);
}

/* ── HELPERS ── */
function fmtRp(val) {
  return Number(val).toLocaleString('id-ID');
}
function esc(str) {
  return String(str)
    .replace(/&/g,'&amp;')
    .replace(/</g,'&lt;')
    .replace(/>/g,'&gt;')
    .replace(/"/g,'&quot;');
}

window.setTab = setTab;
init();
