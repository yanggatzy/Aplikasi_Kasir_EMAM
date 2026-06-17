/* ── Dynamic Date ── */
(function(){
  const b=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d=new Date();
  const el=document.getElementById('currentDate');
  if(el) el.textContent=d.getDate()+' '+b[d.getMonth()]+' '+d.getFullYear();
})();

/* ── Modal helpers ── */
function openModal(id) {
  const m = document.getElementById(id);
  if (m) m.classList.remove('hidden');
}

function closeModal(id) {
  const m = document.getElementById(id);
  if (m) m.classList.add('hidden');
}

document.addEventListener('click', function(e) {
  if (e.target.classList.contains('modal-overlay')) {
    e.target.classList.add('hidden');
  }
});

document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay:not(.hidden)').forEach(m => m.classList.add('hidden'));
  }
});

/* ── Search filter ── */
const searchInput = document.querySelector('.search-input');
if (searchInput) {
  const rows = Array.from(document.querySelectorAll('tbody tr'));
  searchInput.addEventListener('input', function() {
    const query = this.value.trim().toLowerCase();
    rows.forEach(row => {
      row.hidden = query !== '' && !row.textContent.toLowerCase().includes(query);
    });
  });
}

function lihatStruk(btn) {
  const d   = JSON.parse(btn.dataset.struk);
  const sub = d.items.reduce((s, i) => s + i.subtotal, 0);
  const tax = d.total - sub;
  const fmt = v => 'Rp ' + Number(v).toLocaleString('id-ID');

  document.getElementById('rInvoice').textContent  = '#TRX-' + String(d.id).padStart(6, '0');
  document.getElementById('rTanggal').textContent  = d.tgl;
  document.getElementById('rKasir').textContent    = d.kasir;
  document.getElementById('rMeja').textContent     = d.meja;
  document.getElementById('rSubtotal').textContent  = fmt(sub);
  document.getElementById('rTax').textContent       = fmt(tax);
  document.getElementById('rTotal').textContent     = fmt(d.total);

  document.getElementById('rItems').innerHTML = d.items.map(i =>
    `<div>
      <div class="sm-item-top">
        <span class="sm-item-name">${i.nama}</span>
        <span class="sm-item-price">${fmt(i.subtotal)}</span>
      </div>
      <div class="sm-item-qty">${i.jumlah} x ${fmt(i.harga)}</div>
    </div>`
  ).join('');

  openModal('strutModal');
}

function cetakStruk() {
  document.body.classList.add('printing-struk');
  window.print();
}

window.addEventListener('afterprint', () => {
  document.body.classList.remove('printing-struk');
});

window.openModal   = openModal;
window.closeModal  = closeModal;
window.lihatStruk  = lihatStruk;
window.cetakStruk  = cetakStruk;


const pdfBtn = document.querySelector('.btn-float');

if (pdfBtn) {
  pdfBtn.addEventListener('click', () => {
    window.print();
  });
}
