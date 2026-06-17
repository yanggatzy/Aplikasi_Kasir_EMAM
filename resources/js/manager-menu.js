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

document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay:not(.hidden)').forEach(m => m.classList.add('hidden'));
  }
});

/* ── Category filter ── */
let activeCategory = 'all';
let searchQuery = '';

function applyMenuFilters() {
  document.querySelectorAll('tbody tr[data-cat]').forEach(row => {
    const matchesCategory = activeCategory === 'all' || row.dataset.cat === activeCategory;
    const matchesSearch = searchQuery === '' || row.textContent.toLowerCase().includes(searchQuery);
    row.hidden = !(matchesCategory && matchesSearch);
  });
}

const pills = document.querySelectorAll('#categoryPills .pill');
pills.forEach(pill => {
  pill.addEventListener('click', function() {
    pills.forEach(p => p.classList.remove('active'));
    this.classList.add('active');
    activeCategory = this.dataset.cat;
    applyMenuFilters();
  });
});

const searchInput = document.querySelector('.search-input');
if (searchInput) {
  searchInput.addEventListener('input', function() {
    searchQuery = this.value.trim().toLowerCase();
    applyMenuFilters();
  });
}

/* ── Toggle handler ── */
function handleToggle(checkbox) {
  const label = checkbox.parentElement.querySelector('.toggle-label');
  if (label) {
    label.textContent = checkbox.checked ? 'Aktif' : 'Habis';
    label.style.color = checkbox.checked ? 'var(--orange)' : '';
  }
}

/* ── Image preview ── */
function previewAddImage(input) {
  const preview = document.getElementById('addUploadPreview');
  const icon = document.getElementById('uploadIcon');
  const text = document.getElementById('uploadText');

  if (input.files && input.files[0] && preview) {
    const reader = new FileReader();

    reader.onload = e => {
      preview.src = e.target.result;
      preview.style.display = 'block';

      if (icon) icon.style.display = 'none';
      if (text) text.style.display = 'none';
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function previewEditImage(input) {
  const preview = document.getElementById('editUploadPreview');
  if (input.files && input.files[0] && preview) {
    const reader = new FileReader();
    reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
    reader.readAsDataURL(input.files[0]);
  }
}

/* ── CRUD Menu ── */

function openEditMenu(id, nama, idKategori, harga) {
  document.getElementById('editIdMenu').value = id;
  document.getElementById('editNamaMenu').value = nama;
  document.getElementById('editKategoriMenu').value = idKategori;
  document.getElementById('editHargaMenu').value = harga;
  document.getElementById('editUploadPreview').style.display = 'none';
  document.getElementById('editFotoInput').value = '';
  openModal('editMenuModal');
}

function openHapusMenu(id) {
  document.getElementById('hapusIdMenu').value = id;
  openModal('hapusMenuModal');
}

async function submitTambahMenu() {
  const nama = document.getElementById('addNamaMenu').value.trim();
  const idKat = document.getElementById('addKategoriMenu').value;
  const harga = document.getElementById('addHargaMenu').value;
  if (!nama || !harga) { alert('Nama dan harga wajib diisi'); return; }

  const fd = new FormData();
  fd.append('nama_menu', nama);
  fd.append('id_kategori', idKat);
  fd.append('harga', harga);
  const foto = document.getElementById('addFotoInput').files[0];
  if (foto) fd.append('gambar', foto);

  const res = await fetch('/manager/menu', {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': CSRF },
    body: fd,
  });
  const data = await res.json();
  if (data.success) { closeModal('addMenuModal'); window.location.reload(); }
  else {
    const msg = data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal menambah menu';
    alert(msg);
  }
}

async function submitEditMenu() {
  const id   = document.getElementById('editIdMenu').value;
  const nama = document.getElementById('editNamaMenu').value.trim();
  const idKat = document.getElementById('editKategoriMenu').value;
  const harga = document.getElementById('editHargaMenu').value;
  if (!nama || !harga) { alert('Nama dan harga wajib diisi'); return; }

  const fd = new FormData();
  fd.append('nama_menu', nama);
  fd.append('id_kategori', idKat);
  fd.append('harga', harga);
  const foto = document.getElementById('editFotoInput').files[0];
  if (foto) fd.append('gambar', foto);

  const res = await fetch(`/manager/menu/${id}`, {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': CSRF },
    body: fd,
  });
  const data = await res.json();
  if (data.success) { closeModal('editMenuModal'); window.location.reload(); }
  else {
    const msg = data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal menyimpan perubahan';
    alert(msg);
  }
}

async function submitHapusMenu() {
  const id = document.getElementById('hapusIdMenu').value;
  const res = await fetch(`/manager/menu/${id}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': CSRF },
  });
  const data = await res.json();
  if (data.success) { closeModal('hapusMenuModal'); window.location.reload(); }
  else alert('Gagal menghapus menu');
}

async function toggleMenu(id, checkbox) {
  const res = await fetch(`/manager/menu/${id}/toggle`, {
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

window.openModal         = openModal;
window.closeModal        = closeModal;
window.handleToggle      = handleToggle;
window.previewAddImage   = previewAddImage;
window.previewEditImage  = previewEditImage;
window.openEditMenu      = openEditMenu;
window.openHapusMenu     = openHapusMenu;
window.submitTambahMenu  = submitTambahMenu;
window.submitEditMenu    = submitEditMenu;
window.submitHapusMenu   = submitHapusMenu;
window.toggleMenu        = toggleMenu;
