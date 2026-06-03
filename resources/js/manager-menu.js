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
const pills = document.querySelectorAll('#categoryPills .pill');
pills.forEach(pill => {
  pill.addEventListener('click', function() {
    pills.forEach(p => p.classList.remove('active'));
    this.classList.add('active');
    const cat = this.dataset.cat;
    const rows = document.querySelectorAll('tbody tr[data-cat]');
    rows.forEach(row => {
      if (cat === 'all' || row.dataset.cat === cat) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
});

/* ── Toggle handler ── */
function handleToggle(checkbox) {
  const label = checkbox.parentElement.querySelector('.toggle-label');
  if (label) {
    label.textContent = checkbox.checked ? 'Aktif' : 'Habis';
    label.style.color = checkbox.checked ? 'var(--orange)' : '';
  }
}

/* ── Image upload preview ── */
function previewImage(input) {
  const preview = document.getElementById('uploadPreview');
  if (input.files && input.files[0] && preview) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
}
