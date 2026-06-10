/* ── Dynamic Date ── */
(function(){
  const b=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d=new Date();
  const el=document.getElementById('currentDate');
  if(el) el.textContent=d.getDate()+' '+b[d.getMonth()]+' '+d.getFullYear();
})();

/* ── Chart dari server ── */
const chartData = window.DASHBOARD?.chartData ?? [];
const MAX_VALUE = window.DASHBOARD?.chartMax ?? 10;

const barsEl   = document.getElementById('chartBars');
const labelsEl = document.getElementById('chartLabels');

if (barsEl && labelsEl) {
  const chartHeight = barsEl.clientHeight || 340;
  chartData.forEach(d => {
    const heightPx = MAX_VALUE > 0 ? (d.value / MAX_VALUE) * chartHeight : 0;

    const col = document.createElement('div');
    col.className = 'chart-bar-col';
    const rupiah = 'Rp ' + d.value.toLocaleString('id-ID');
    col.innerHTML = `<div class="chart-bar" style="height:${heightPx}px" title="${d.label}: ${rupiah}"></div>`;
    barsEl.appendChild(col);

    const lbl = document.createElement('div');
    lbl.className = 'chart-x-label';
    lbl.textContent = d.label;
    labelsEl.appendChild(lbl);
  });
}