/* ── CONFIG ── */
const IMG_FALLBACK = window.APP.imgMenu;
const CSRF         = window.APP.csrf;

/* ── STATE ── */
let menuData = [];
let cart     = [];
let filter   = 'Semua Menu';
let search   = '';

/* ── LOAD MENUS FROM DB ── */
async function loadMenus() {
  const res  = await fetch('/kasir/menus');
  menuData   = await res.json();
  renderMenu();
}

/* ── RENDER MENU ── */
function renderMenu() {
  const grid     = document.getElementById('menuGrid');
  const filtered = menuData.filter(m => {
    const matchCat  = filter === 'Semua Menu' || m.kategori === filter;
    const matchSrch = m.nama_menu.toLowerCase().includes(search.toLowerCase());
    return matchCat && matchSrch;
  });

  if (!filtered.length) {
    grid.innerHTML = `<p style="grid-column:1/-1;color:var(--text-mid);padding:20px 0;font-size:13px;">Menu tidak ditemukan.</p>`;
    return;
  }

  grid.innerHTML = filtered.map(m => `
    <div class="menu-card" onclick="addToCart(${m.id})">
      <div class="menu-card-img-wrap">
        <img class="menu-card-img" src="${m.gambar ? '/storage/' + m.gambar : IMG_FALLBACK}" alt="${m.nama_menu}" loading="lazy">
      </div>
      <div class="menu-card-body">
        <div class="menu-card-name">${m.nama_menu}</div>
        <div class="menu-card-cat">${m.kategori}</div>
        <div class="menu-card-footer">
          <div class="menu-price">Rp ${Number(m.harga).toLocaleString('id-ID')}</div>
          <button class="add-btn" onclick="event.stopPropagation();addToCart(${m.id})" title="Tambah">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
              <path d="M6 8H0V6H6V0H8V6H14V8H8V14H6V8Z" fill="white"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  `).join('');
}

/* ── CART ── */
function addToCart(id) {
  const item  = menuData.find(m => m.id === id);
  if (!item) return;
  const entry = cart.find(c => c.item.id === id);
  if (entry) entry.qty++;
  else cart.push({ item, qty: 1 });
  renderOrder();
}

function changeQty(id, delta) {
  const idx = cart.findIndex(c => c.item.id === id);
  if (idx === -1) return;
  cart[idx].qty += delta;
  if (cart[idx].qty <= 0) cart.splice(idx, 1);
  renderOrder();
}

function removeItem(id) {
  cart = cart.filter(c => c.item.id !== id);
  renderOrder();
}

function fmtRp(val) {
  return 'Rp ' + Number(val).toLocaleString('id-ID');
}

function renderOrder() {
  const container = document.getElementById('orderItems');
  const badge     = document.getElementById('itemsBadge');
  const payBtn    = document.getElementById('payBtn');

  const totalQty = cart.reduce((s, c) => s + c.qty, 0);
  const subtotal = cart.reduce((s, c) => s + Number(c.item.harga) * c.qty, 0);
  const tax      = Math.round(subtotal * 0.1);
  const total    = subtotal + tax;

  badge.textContent = totalQty + ' ITEMS';
  document.getElementById('subtotalVal').textContent = fmtRp(subtotal);
  document.getElementById('taxVal').textContent      = fmtRp(tax);
  document.getElementById('totalVal').textContent    = fmtRp(total);
  payBtn.disabled = cart.length === 0;

  if (!cart.length) {
    container.innerHTML = `
      <div class="order-empty">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
          <path d="M14 36C12.9 36 11.958 35.608 11.175 34.825C10.392 34.042 10 33.1 10 32V12H8V9H18V8H26V9H36V12H34V32C34 33.1 33.608 34.042 32.825 34.825C32.042 35.608 31.1 36 30 36H14ZM18 29H20V15H18V29ZM24 29H26V15H24V29Z" fill="currentColor"/>
        </svg>
        <p>Belum ada pesanan.<br>Pilih menu untuk mulai!</p>
      </div>`;
    return;
  }

  container.innerHTML = cart.map(entry => `
    <div class="order-item">
      <div class="order-item-thumb">
        <img src="${entry.item.gambar ? '/storage/' + entry.item.gambar : IMG_FALLBACK}" alt="${entry.item.nama_menu}" loading="lazy">
      </div>
      <div class="order-item-info">
        <div class="order-item-top">
          <span class="order-item-name">${entry.item.nama_menu}</span>
          <span class="order-item-price">${fmtRp(entry.item.harga)}</span>
        </div>
        <div class="qty-row">
          <button class="qty-btn" onclick="changeQty(${entry.item.id},-1)">−</button>
          <span class="qty-num">${entry.qty}</span>
          <button class="qty-btn" onclick="changeQty(${entry.item.id},1)">+</button>
        </div>
      </div>
      <button class="del-btn" onclick="confirmDelete(${entry.item.id})" title="Hapus">
        <svg width="15" height="17" viewBox="0 0 16 18" fill="none">
          <path d="M3 18C2.45 18 1.979 17.804 1.588 17.413C1.196 17.021 1 16.55 1 16V3H0V1H5V0H11V1H16V3H15V16C15 16.55 14.804 17.021 14.413 17.413C14.021 17.804 13.55 18 13 18H3ZM13 3H3V16H13V3ZM5 14H7V5H5V14ZM9 14H11V5H9V14Z" fill="currentColor"/>
        </svg>
      </button>
    </div>
  `).join('');
}

/* ── EVENTS: filter, search, order type ── */
document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    filter = btn.dataset.cat;
    renderMenu();
  });
});

document.getElementById('searchInput').addEventListener('input', e => {
  search = e.target.value;
  renderMenu();
});

document.getElementById('dineInBtn').addEventListener('click', () => {
  document.getElementById('dineInBtn').classList.add('active');
  document.getElementById('takeAwayBtn').classList.remove('active');
});

document.getElementById('takeAwayBtn').addEventListener('click', () => {
  document.getElementById('takeAwayBtn').classList.add('active');
  document.getElementById('dineInBtn').classList.remove('active');
});

/* ── PILIH STATUS MEJA ── */
const mejaStatusPending = { id: null, action: null, nama: null };

function pilihStatusMeja(action, btn, prefix) {
  prefix = prefix || '';
  const infoId = prefix ? `${prefix}MejaInfo` : 'mejaStatusInfo';
  const rBtnId = prefix ? `${prefix}BtnReservasi` : 'btnReservasi';
  const iBtnId = prefix ? `${prefix}BtnIsi`       : 'btnIsi';
  const mejaId = prefix === 'qris' ? 'qrisMeja' : prefix === 'tf' ? 'tfMeja' : 'mejaSelect';

  const sel = document.getElementById(mejaId);
  mejaStatusPending.id     = sel.value ? parseInt(sel.value) : null;
  mejaStatusPending.action = action;
  mejaStatusPending.nama   = sel.options[sel.selectedIndex]?.textContent || '-';

  const rBtn = document.getElementById(rBtnId);
  const iBtn = document.getElementById(iBtnId);
  const info = document.getElementById(infoId);
  const isR  = action === 'dipesan';

  rBtn.style.borderColor = isR  ? '#3B82F6' : '#EAE1DC';
  rBtn.style.background  = isR  ? '#DBEAFE' : '#fff';
  rBtn.style.color       = isR  ? '#1D4ED8' : '#594238';
  iBtn.style.borderColor = !isR ? '#EF4444' : '#EAE1DC';
  iBtn.style.background  = !isR ? '#FEE2E2' : '#fff';
  iBtn.style.color       = !isR ? '#DC2626' : '#594238';
  info.style.display     = 'block';
  info.textContent       = `✓ ${mejaStatusPending.nama} akan di-set: ${isR ? 'Reservasi (Dipesan)' : 'Isi (Terisi)'}`;
}

/* ── POPULATE MEJA SELECTS (hanya yang tersedia dari DB) ── */
async function populateMejaSelects() {
  const res   = await fetch('/kasir/mejas-tersedia');
  const mejas = await res.json();

  ['mejaSelect', 'qrisMeja', 'tfMeja'].forEach(selId => {
    const sel = document.getElementById(selId);
    if (!sel) return;
    sel.innerHTML = mejas.length
      ? mejas.map(m => `<option value="${m.id}">${m.nama}</option>`).join('')
      : '<option value="" disabled>— Semua meja penuh —</option>';
  });

  mejaStatusPending.id     = null;
  mejaStatusPending.action = null;
  mejaStatusPending.nama   = null;

  /* reset highlight status meja */
  ['mejaStatusInfo','qrisMejaInfo','tfMejaInfo'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.style.display = 'none';
  });
  ['btnReservasi','btnIsi','qrisBtnReservasi','qrisBtnIsi','tfBtnReservasi','tfBtnIsi'].forEach(id => {
    const el = document.getElementById(id);
    if (el) { el.style.borderColor='#EAE1DC'; el.style.background='#fff'; el.style.color='#594238'; }
  });
}

/* ── TANGGAL DINAMIS ── */
(function () {
  const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d = new Date();
  document.getElementById('currentDate').textContent = d.getDate() + ' ' + bulan[d.getMonth()] + ' ' + d.getFullYear();
})();

/* ── PAY BUTTON → open modal ── */
document.getElementById('payBtn').addEventListener('click', async () => {
  if (!cart.length) return;
  const sub   = cart.reduce((s, c) => s + Number(c.item.harga) * c.qty, 0);
  const total = sub + Math.round(sub * 0.1);
  document.getElementById('payModalTotal').textContent   = fmtRp(total);
  document.getElementById('tunaiAmtDisplay').textContent = fmtRp(total);
  document.getElementById('qrisSubtotal').textContent    = fmtRp(total);
  await populateMejaSelects();
  document.getElementById('payModal').classList.remove('hidden');
  setMethod('tunai');
});

/* ── PAYMENT METHOD TOGGLE ── */
const vaMap = {
  BCA:     ['Virtual Account BCA',     '8839 0812 3456 7890'],
  Mandiri: ['Virtual Account Mandiri', '8765 0789 2423 9823'],
  BNI:     ['Virtual Account BNI',     '2344 2789 7869 7987'],
};

function setMethod(m) {
  document.querySelectorAll('.pay-method-btn').forEach(b => {
    const isActive = b.dataset.method === m;
    b.style.background  = isActive ? '#D35400' : '#fff';
    b.style.borderColor = isActive ? '#D35400' : '#EAE1DC';
    b.style.color       = isActive ? '#fff'    : '#594238';
  });
  document.getElementById('methodTunai').style.display    = m === 'tunai'    ? 'flex' : 'none';
  document.getElementById('methodQris').style.display     = m === 'qris'     ? 'flex' : 'none';
  document.getElementById('methodTransfer').style.display = m === 'transfer' ? 'flex' : 'none';
  const btn = document.getElementById('payConfirmBtn');
  btn.innerHTML = m === 'qris'
    ? '↻ &nbsp;CEK STATUS PEMBAYARAN'
    : `<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" fill="white"/></svg> ${m === 'transfer' ? 'KONFIRMASI TRANSFER' : 'PROSES PEMBAYARAN'}`;
}

document.querySelectorAll('.pay-method-btn').forEach(b => {
  b.addEventListener('click', () => setMethod(b.dataset.method));
});

document.querySelectorAll('.bank-btn').forEach(b => {
  b.addEventListener('click', () => {
    document.querySelectorAll('.bank-btn').forEach(x => {
      x.style.borderColor = '#EAE1DC'; x.style.color = '#594238';
      x.textContent = x.dataset.bank;
    });
    b.style.borderColor = '#D35400'; b.style.color = '#D35400';
    b.textContent = '✔ ' + b.dataset.bank;
    const [label, num] = vaMap[b.dataset.bank];
    document.getElementById('vaLabel').textContent  = label;
    document.getElementById('vaNumber').textContent = num;
  });
});

/* ── CONFIRM PAYMENT → POST KE BACKEND ── */
document.getElementById('payConfirmBtn').addEventListener('click', async () => {
  const activeMethod = ['tunai','qris','transfer'].find(m =>
    document.getElementById('method' + m.charAt(0).toUpperCase() + m.slice(1)).style.display !== 'none'
  ) || 'tunai';

  let nama = '-', idMeja = null;

  if (activeMethod === 'tunai') {
    nama   = document.querySelector('#methodTunai input[type=text]')?.value || '-';
    idMeja = document.getElementById('mejaSelect')?.value || null;
  } else if (activeMethod === 'qris') {
    nama   = document.getElementById('qrisNama')?.value || '-';
    idMeja = document.getElementById('qrisMeja')?.value || null;
  } else {
    nama   = document.getElementById('tfNama')?.value || '-';
    idMeja = document.getElementById('tfMeja')?.value || null;
  }

  const jenisBtn = document.getElementById('takeAwayBtn').classList.contains('active') ? 'takeaway' : 'dine-in';

  const payload = {
    nama_pelanggan:    nama || '-',
    jenis_pesanan:     jenisBtn,
    metode_pembayaran: activeMethod,
    id_meja:           idMeja ? parseInt(idMeja) : null,
    status_meja:       mejaStatusPending.action  || null,
    items: cart.map(c => ({ id_menu: c.item.id, jumlah: c.qty })),
  };

  const confirmBtn = document.getElementById('payConfirmBtn');
  confirmBtn.disabled   = true;
  confirmBtn.textContent = 'Memproses...';

  try {
    const res  = await fetch('/kasir/transaksi', {
      method:  'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
      body:    JSON.stringify(payload),
    });
    const data = await res.json();
    if (!data.success) throw new Error('Gagal menyimpan transaksi');

    /* isi struk dari respons server */
    const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const now   = new Date();
    const tgl   = `${now.getDate()} ${bulan[now.getMonth()]} ${now.getFullYear()} ${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}`;
    const metodeLbl = { tunai:'Tunai', qris:'QRIS', transfer:'Transfer' };

    document.getElementById('rTanggal').textContent   = tgl;
    document.getElementById('rKasir').textContent     = window.APP.username;
    document.getElementById('rPelanggan').textContent = data.transaksi.nama_pelanggan || '-';
    document.getElementById('rMeja').textContent      = mejaStatusPending.nama || '-';
    document.getElementById('rMetode').textContent    = metodeLbl[activeMethod] || '-';
    document.getElementById('rSubtotal').textContent  = fmtRp(data.subtotal);
    document.getElementById('rTax').textContent       = fmtRp(data.pajak);
    document.getElementById('rTotal').textContent     = fmtRp(data.total);

    document.getElementById('rItems').innerHTML = data.items.map(e =>
      `<div style="display:flex;justify-content:space-between;gap:8px;">
         <span style="flex:1;">${e.nama}</span>
         <span style="color:#888;white-space:nowrap;">${e.jumlah}x</span>
         <span style="white-space:nowrap;">${fmtRp(e.subtotal)}</span>
       </div>`
    ).join('');

    document.getElementById('payModal').classList.add('hidden');
    document.getElementById('strutModal').classList.remove('hidden');

    cart = [];
    renderOrder();
    mejaStatusPending.id     = null;
    mejaStatusPending.action = null;
    mejaStatusPending.nama   = null;

  } catch (err) {
    alert('Transaksi gagal disimpan. Coba lagi.');
    console.error(err);
  } finally {
    confirmBtn.disabled = false;
    setMethod(activeMethod);
  }
});

function tutupStruk() {
  document.getElementById('strutModal').classList.add('hidden');
}

/* ── DELETE CONFIRM ── */
let pendingDeleteId = null;

function confirmDelete(id) {
  pendingDeleteId = id;
  document.getElementById('deleteModal').classList.remove('hidden');
}

document.getElementById('deleteConfirmBtn').addEventListener('click', () => {
  if (pendingDeleteId !== null) { removeItem(pendingDeleteId); pendingDeleteId = null; }
  document.getElementById('deleteModal').classList.add('hidden');
});

/* ── INIT ── */
loadMenus();

/* expose ke global agar inline onclick di HTML bisa memanggil */
window.addToCart       = addToCart;
window.changeQty       = changeQty;
window.confirmDelete   = confirmDelete;
window.pilihStatusMeja = pilihStatusMeja;
window.tutupStruk      = tutupStruk;
