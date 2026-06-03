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

/* ── Password toggle ── */
function togglePassword(inputId, btnId) {
  const input = document.getElementById(inputId);
  if (!input) return;
  input.type = input.type === 'password' ? 'text' : 'password';
}

/* ── Role radio selection ── */
function selectRole(item, role) {
  const group = item.closest('.radio-group');
  if (!group) return;
  group.querySelectorAll('.radio-item').forEach(i => i.classList.remove('selected'));
  item.classList.add('selected');
}
