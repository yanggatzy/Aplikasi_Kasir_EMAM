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

/* ── Toggle handler ── */
function handleToggle(checkbox) {
  const card = checkbox.closest('.meja-card');
  if (!card) return;
  const idEl = card.querySelector('.meja-id');
  const badgeEl = card.querySelector('[class^="badge-"]');
  if (checkbox.checked) {
    if (idEl) { idEl.classList.remove('nonaktif'); idEl.classList.add('aktif'); }
    if (badgeEl) { badgeEl.className = 'badge-aktif-meja'; badgeEl.textContent = 'AKTIF'; }
  } else {
    if (idEl) { idEl.classList.remove('aktif'); idEl.classList.add('nonaktif'); }
    if (badgeEl) { badgeEl.className = 'badge-nonaktif-meja'; badgeEl.textContent = 'NON-AKTIF'; }
  }
}
