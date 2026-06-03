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

/* Close modal on overlay click */
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('modal-overlay')) {
    e.target.classList.add('hidden');
  }
});

/* ── Toggle switch label update ── */
function handleToggle(checkbox) {
  const label = checkbox.parentElement.querySelector('.toggle-label');
  if (label) {
    label.textContent = checkbox.checked ? 'Aktif' : 'Non-Aktif';
    label.style.color = checkbox.checked ? 'var(--orange)' : '';
  }
}

/* Escape key closes modals */
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay:not(.hidden)').forEach(m => m.classList.add('hidden'));
  }
});
