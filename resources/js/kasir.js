/* ── DATA MENU ── */
const IMG = window.APP.imgMenu;

const menuData = [
  { id:1,  name:'Nasi Goreng Spesial', cat:'Makanan Utama', price:20000 },
  { id:2,  name:'Es Teh Manis',        cat:'Minuman',       price:6000  },
  { id:3,  name:'Ayam Bakar Madu',     cat:'Makanan Utama', price:42000 },
  { id:4,  name:'Kentang Goreng',      cat:'Snacks',        price:15000 },
  { id:5,  name:'Es Jeruk Peras',      cat:'Minuman',       price:9000  },
  { id:6,  name:'Pisang Keju',         cat:'Dessert',       price:15000 },
  { id:7,  name:'Soto Ayam',           cat:'Makanan Utama', price:18000 },
  { id:8,  name:'Bakso Urat',          cat:'Makanan Utama', price:22000 },
  { id:9,  name:'Gado-Gado',           cat:'Makanan Utama', price:16000 },
  { id:10, name:'Es Kopi Susu',        cat:'Minuman',       price:12000 },
  { id:11, name:'Tempe Mendoan',       cat:'Snacks',        price:8000  },
  { id:12, name:'Es Krim Coklat',      cat:'Dessert',       price:12000 },
];

const sampleNotes = { 1:'Tanpa telur ceplok', 5:'Es sedikit', 3:'Sambal dipisah' };

/* ── STATE ── */
let cart   = [];
let filter = 'Semua Menu';
let search = '';

/* ── RENDER MENU ── */
function renderMenu() {
  const grid = document.getElementById('menuGrid');
  const filtered = menuData.filter(m => {
    const matchCat  = filter === 'Semua Menu' || m.cat === filter;
    const matchSrch = m.name.toLowerCase().includes(search.toLowerCase());
    return matchCat && matchSrch;
  });

  if (!filtered.length) {
    grid.innerHTML = `<p style="grid-column:1/-1;color:var(--text-mid);padding:20px 0;font-size:13px;">Menu tidak ditemukan.</p>`;
    return;
  }

  grid.innerHTML = filtered.map(m => `
    <div class="menu-card" onclick="addToCart(${m.id})">
      <div class="menu-card-img-wrap">
        <img class="menu-card-img" src="${IMG}" alt="${m.name}" loading="lazy">
      </div>
      <div class="menu-card-body">
        <div class="menu-card-name">${m.name}</div>
        <div class="menu-card-cat">${m.cat}</div>
        <div class="menu-card-footer">
          <div class="menu-price">Rp ${m.price.toLocaleString('id-ID')}</div>
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
  return 'Rp ' + val.toLocaleString('id-ID');
}

function renderOrder() {
  const container = document.getElementById('orderItems');
  const badge     = document.getElementById('itemsBadge');
  const payBtn    = document.getElementById('payBtn');

  const totalQty  = cart.reduce((s, c) => s + c.qty, 0);
  const subtotal  = cart.reduce((s, c) => s + c.item.price * c.qty, 0);
  const tax       = Math.round(subtotal * 0.1);
  const total     = subtotal + tax;

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
        <img src="${IMG}" alt="${entry.item.name}" loading="lazy">
      </div>
      <div class="order-item-info">
        <div class="order-item-top">
          <span class="order-item-name">${entry.item.name}</span>
          <span class="order-item-price">${fmtRp(entry.item.price)}</span>
        </div>
        ${sampleNotes[entry.item.id] ? `<div class="order-item-note">${sampleNotes[entry.item.id]}</div>` : ''}
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

/* ── EVENTS ── */
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

/* ── PILIH STATUS MEJA (tanpa redirect) ── */
const mejaStatusPending = { meja: null, action: null };

function pilihStatusMeja(action, btn, prefix) {
  prefix = prefix || '';
  const infoId = prefix ? `${prefix}MejaInfo` : 'mejaStatusInfo';
  const rBtnId = prefix ? `${prefix}BtnReservasi` : 'btnReservasi';
  const iBtnId = prefix ? `${prefix}BtnIsi`       : 'btnIsi';
  const mejaId = prefix === 'qris' ? 'qrisMeja' : prefix === 'tf' ? 'tfMeja' : 'mejaSelect';

  mejaStatusPending.meja   = document.getElementById(mejaId).value;
  mejaStatusPending.action = action;

  const rBtn = document.getElementById(rBtnId);
  const iBtn = document.getElementById(iBtnId);
  const info = document.getElementById(infoId);
  const isR  = action === 'dipesan';

  rBtn.style.borderColor = isR ? '#3B82F6' : '#EAE1DC';
  rBtn.style.background  = isR ? '#DBEAFE' : '#fff';
  rBtn.style.color       = isR ? '#1D4ED8' : '#594238';
  iBtn.style.borderColor = !isR ? '#EF4444' : '#EAE1DC';
  iBtn.style.background  = !isR ? '#FEE2E2' : '#fff';
  iBtn.style.color       = !isR ? '#DC2626' : '#594238';
  info.style.display     = 'block';
  info.textContent       = `✓ ${mejaStatusPending.meja} akan di-set: ${isR ? 'Reservasi (Dipesan)' : 'Isi (Terisi)'}`;
}

/* ── TANGGAL DINAMIS ── */
(function() {
  const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d = new Date();
  document.getElementById('currentDate').textContent = d.getDate() + ' ' + bulan[d.getMonth()] + ' ' + d.getFullYear();
})();

/* ── PAY BUTTON → open modal ── */
document.getElementById('payBtn').addEventListener('click', () => {
  if (!cart.length) return;
  const sub   = cart.reduce((s,c) => s + c.item.price * c.qty, 0);
  const total = sub + Math.round(sub * 0.1);
  document.getElementById('payModalTotal').textContent  = fmtRp(total);
  document.getElementById('tunaiAmtDisplay').textContent = fmtRp(total);
  document.getElementById('qrisSubtotal').textContent    = fmtRp(total);
  document.getElementById('payModal').classList.remove('hidden');
  setMethod('tunai');
});

/* ── PAYMENT METHOD TOGGLE ── */
const vaMap = { BCA: ['Virtual Account BCA','8839 0812 3456 7890'], Mandiri: ['Virtual Account Mandiri','8765 0789 2423 9823'], BNI: ['Virtual Account BNI','2344 2789 7869 7987'] };

function setMethod(m) {
  document.querySelectorAll('.pay-method-btn').forEach(b => {
    const isActive = b.dataset.method === m;
    b.style.background     = isActive ? '#D35400' : '#fff';
    b.style.borderColor    = isActive ? '#D35400' : '#EAE1DC';
    b.style.color          = isActive ? '#fff'    : '#594238';
  });
  document.getElementById('methodTunai').style.display    = m === 'tunai'    ? 'flex' : 'none';
  document.getElementById('methodQris').style.display     = m === 'qris'     ? 'flex' : 'none';
  document.getElementById('methodTransfer').style.display = m === 'transfer' ? 'flex' : 'none';
  const btn = document.getElementById('payConfirmBtn');
  btn.textContent = m === 'qris' ? '↻  CEK STATUS PEMBAYARAN' : m === 'transfer' ? '✔ KONFIRMASI TRANSFER' : '✔ PROSES PEMBAYARAN';
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

document.getElementById('payConfirmBtn').addEventListener('click', () => {
  const method  = document.querySelector('.pay-method-btn.active-method, .pay-method-btn[style*="background: rgb(211"]') ;
  const sub     = cart.reduce((s,c) => s + c.item.price * c.qty, 0);
  const tax     = Math.round(sub * 0.1);
  const total   = sub + tax;

  /* Ambil nama & meja sesuai metode aktif */
  let nama = '-', mejaVal = '-';
  const activeMethod = document.querySelector('.pay-method-btn[style*="rgb(211"]')?.dataset?.method
    || (document.getElementById('methodTunai').style.display !== 'none' ? 'tunai'
      : document.getElementById('methodQris').style.display  !== 'none' ? 'qris' : 'transfer');

  if (activeMethod === 'tunai') {
    nama    = document.querySelector('#methodTunai input[type=text]')?.value || '-';
    mejaVal = document.getElementById('mejaSelect')?.value || '-';
  } else if (activeMethod === 'qris') {
    nama    = document.getElementById('qrisNama')?.value || '-';
    mejaVal = document.getElementById('qrisMeja')?.value || '-';
  } else {
    nama    = document.getElementById('tfNama')?.value || '-';
    mejaVal = document.getElementById('tfMeja')?.value || '-';
  }

  const metodeLbl = { tunai:'Tunai', qris:'QRIS', transfer:'Transfer' };

  /* Simpan pending meja ke localStorage agar status-meja bisa update */
  if (mejaStatusPending.meja && mejaStatusPending.action) {
    localStorage.setItem('pendingMeja', JSON.stringify(mejaStatusPending));
  }

  /* Isi struk */
  const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
  const now   = new Date();
  const tgl   = `${now.getDate()} ${bulan[now.getMonth()]} ${now.getFullYear()} ${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}`;

  document.getElementById('rTanggal').textContent  = tgl;
  document.getElementById('rKasir').textContent    = window.APP.username;
  document.getElementById('rPelanggan').textContent = nama || '-';
  document.getElementById('rMeja').textContent     = mejaVal;
  document.getElementById('rMetode').textContent   = metodeLbl[activeMethod] || '-';
  document.getElementById('rSubtotal').textContent = fmtRp(sub);
  document.getElementById('rTax').textContent      = fmtRp(tax);
  document.getElementById('rTotal').textContent    = fmtRp(total);

  document.getElementById('rItems').innerHTML = cart.map(e =>
    `<div style="display:flex;justify-content:space-between;gap:8px;">
       <span style="flex:1;">${e.item.name}</span>
       <span style="color:#888;white-space:nowrap;">${e.qty}x</span>
       <span style="white-space:nowrap;">${fmtRp(e.item.price * e.qty)}</span>
     </div>`
  ).join('');

  document.getElementById('payModal').classList.add('hidden');
  document.getElementById('strutModal').classList.remove('hidden');

  cart = [];
  renderOrder();
  mejaStatusPending.meja   = null;
  mejaStatusPending.action = null;
});

function tutupStruk() {
  document.getElementById('strutModal').classList.add('hidden');
  /* Setelah struk ditutup, redirect ke status-meja jika ada pending */
  const p = localStorage.getItem('pendingMeja');
  if (p) {
    const { meja, action } = JSON.parse(p);
    localStorage.removeItem('pendingMeja');
    window.location.href = `${window.APP.routeStatusMeja}?meja=${meja}&action=${action}`;
  }
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
renderMenu();
