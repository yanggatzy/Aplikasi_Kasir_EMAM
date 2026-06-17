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

/* ── CRUD Meja ── */

function openEditMeja(id, nama, kapasitas, lokasi) {
  document.getElementById('editIdMeja').value = id;
  document.getElementById('editNamaMeja').value = nama;
  document.getElementById('editKapasitasMeja').value = kapasitas;
  document.getElementById('editLokasiMeja').value = lokasi;
  openModal('editMejaModal');
}

function openHapusMeja(id) {
  document.getElementById('hapusIdMeja').value = id;
  openModal('hapusMejaModal');
}

async function submitTambahMeja() {
  const kode     = document.getElementById('addKodeMeja').value.trim();
  const nama     = document.getElementById('addNamaMeja').value.trim();
  const kapasitas = document.getElementById('addKapasitasMeja').value;
  const lokasi   = document.getElementById('addLokasiMeja').value;
  if (!kode || !nama || !kapasitas) { alert('Kode, nama, dan kapasitas wajib diisi'); return; }

  const res = await fetch('/manager/meja', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    body: JSON.stringify({ kode_meja: kode, nama_meja: nama, kapasitas: parseInt(kapasitas), lokasi }),
  });
  const data = await res.json();
  if (data.success) { closeModal('addMejaModal'); window.location.reload(); }
  else {
    const msg = data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal menambah meja';
    alert(msg);
  }
}

async function submitEditMeja() {
  const id       = document.getElementById('editIdMeja').value;
  const nama     = document.getElementById('editNamaMeja').value.trim();
  const kapasitas = document.getElementById('editKapasitasMeja').value;
  const lokasi   = document.getElementById('editLokasiMeja').value;
  if (!nama || !kapasitas) { alert('Nama dan kapasitas wajib diisi'); return; }

  const res = await fetch(`/manager/meja/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    body: JSON.stringify({ nama_meja: nama, kapasitas: parseInt(kapasitas), lokasi }),
  });
  const data = await res.json();
  if (data.success) { closeModal('editMejaModal'); window.location.reload(); }
  else alert('Gagal menyimpan perubahan');
}

async function toggleMeja(id, checkbox) {
  const res = await fetch(`/manager/meja/${id}/toggle`, {
    method: 'PATCH',
    headers: { 'X-CSRF-TOKEN': CSRF },
  });
  const data = await res.json();
  if (!data.success) {
    checkbox.checked = !checkbox.checked;
    alert('Gagal mengubah status meja');
  }
}

async function submitHapusMeja() {
  const id = document.getElementById('hapusIdMeja').value;
  const res = await fetch(`/manager/meja/${id}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': CSRF },
  });
  const data = await res.json();
  if (data.success) { closeModal('hapusMejaModal'); window.location.reload(); }
  else alert('Gagal menghapus meja');
}

window.openModal        = openModal;
window.closeModal       = closeModal;
window.openEditMeja     = openEditMeja;
window.openHapusMeja    = openHapusMeja;
window.submitTambahMeja = submitTambahMeja;
window.submitEditMeja   = submitEditMeja;
window.submitHapusMeja  = submitHapusMeja;
window.toggleMeja       = toggleMeja;
