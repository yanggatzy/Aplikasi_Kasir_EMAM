const CSRF = window.APP.csrf;

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

function handleToggle(checkbox) {
  const label = checkbox.parentElement.querySelector('.toggle-label');
  if (label) {
    label.textContent = checkbox.checked ? 'Aktif' : 'Non-Aktif';
    label.style.color = checkbox.checked ? 'var(--orange)' : '';
  }
}

document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay:not(.hidden)').forEach(m => m.classList.add('hidden'));
  }
});

/* ── CRUD Kategori ── */

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

function openEditKategori(id, nama, deskripsi) {
  document.getElementById('editIdKategori').value = id;
  document.getElementById('editNamaKategori').value = nama;
  document.getElementById('editDeskripsiKategori').value = deskripsi;
  openModal('editKategoriModal');
}

function openHapusKategori(id) {
  document.getElementById('hapusIdKategori').value = id;
  openModal('hapusKategoriModal');
}

async function submitTambahKategori() {
  const nama = document.getElementById('addNamaKategori').value.trim();
  const deskripsi = document.getElementById('addDeskripsiKategori').value.trim();
  if (!nama) { alert('Nama kategori wajib diisi'); return; }
  const res = await fetch('/manager/kategori', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    body: JSON.stringify({ nama_kategori: nama, deskripsi }),
  });
  const data = await res.json();
  if (data.success) { closeModal('addKategoriModal'); window.location.reload(); }
  else alert('Gagal menambah kategori');
}

async function submitEditKategori() {
  const id = document.getElementById('editIdKategori').value;
  const nama = document.getElementById('editNamaKategori').value.trim();
  const deskripsi = document.getElementById('editDeskripsiKategori').value.trim();
  if (!nama) { alert('Nama kategori wajib diisi'); return; }
  const res = await fetch(`/manager/kategori/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    body: JSON.stringify({ nama_kategori: nama, deskripsi }),
  });
  const data = await res.json();
  if (data.success) { closeModal('editKategoriModal'); window.location.reload(); }
  else alert('Gagal menyimpan perubahan');
}

async function submitHapusKategori() {
  const id = document.getElementById('hapusIdKategori').value;
  const res = await fetch(`/manager/kategori/${id}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': CSRF },
  });
  const data = await res.json();
  if (data.success) { closeModal('hapusKategoriModal'); window.location.reload(); }
  else alert('Gagal menghapus kategori');
}

async function toggleKategori(id, checkbox) {
  const res = await fetch(`/manager/kategori/${id}/toggle`, {
    method: 'PATCH',
    headers: { 'X-CSRF-TOKEN': CSRF },
  });
  const data = await res.json();
  if (data.success) {
    handleToggle(checkbox);
  } else {
    checkbox.checked = !checkbox.checked;
    alert('Gagal mengubah status');
  }
}

window.openModal           = openModal;
window.closeModal          = closeModal;
window.handleToggle        = handleToggle;
window.openEditKategori    = openEditKategori;
window.openHapusKategori   = openHapusKategori;
window.submitTambahKategori = submitTambahKategori;
window.submitEditKategori  = submitEditKategori;
window.submitHapusKategori = submitHapusKategori;
window.toggleKategori      = toggleKategori;
