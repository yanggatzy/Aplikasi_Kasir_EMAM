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

/* ── CRUD User ── */

function openEditUser(id, username) {
  document.getElementById('editIdUser').value = id;
  document.getElementById('editUsernameUser').value = username;
  document.getElementById('editPasswordUser').value = '';
  openModal('editUserModal');
}

function openHapusUser(id) {
  document.getElementById('hapusIdUser').value = id;
  openModal('hapusUserModal');
}

async function submitTambahUser() {
  const username = document.getElementById('addUsernameUser').value.trim();
  const password = document.getElementById('addPasswordUser').value;
  const role     = document.getElementById('addRoleUser').value;
  if (!username || !password) { alert('Username dan password wajib diisi'); return; }

  const res = await fetch('/manager/user', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    body: JSON.stringify({ username, password, role }),
  });
  const data = await res.json();
  if (data.success) { closeModal('addUserModal'); window.location.reload(); }
  else {
    const msg = data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal menambah user';
    alert(msg);
  }
}

async function submitEditUser() {
  const id       = document.getElementById('editIdUser').value;
  const username = document.getElementById('editUsernameUser').value.trim();
  const password = document.getElementById('editPasswordUser').value;
  if (!username) { alert('Username wajib diisi'); return; }

  const body = { username };
  if (password) body.password = password;

  const res = await fetch(`/manager/user/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    body: JSON.stringify(body),
  });
  const data = await res.json();
  if (data.success) { closeModal('editUserModal'); window.location.reload(); }
  else {
    const msg = data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal menyimpan perubahan';
    alert(msg);
  }
}

async function submitHapusUser() {
  const id = document.getElementById('hapusIdUser').value;
  const res = await fetch(`/manager/user/${id}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': CSRF },
  });
  const data = await res.json();
  if (data.success) { closeModal('hapusUserModal'); window.location.reload(); }
  else alert(data.message || 'Gagal menghapus user');
}

window.openModal        = openModal;
window.closeModal       = closeModal;
window.openEditUser     = openEditUser;
window.openHapusUser    = openHapusUser;
window.submitTambahUser = submitTambahUser;
window.submitEditUser   = submitEditUser;
window.submitHapusUser  = submitHapusUser;
