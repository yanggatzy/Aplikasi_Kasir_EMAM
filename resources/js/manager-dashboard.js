/* ── Dynamic Date ── */
(function(){
  const b=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d=new Date();
  const el=document.getElementById('currentDate');
  if(el) el.textContent=d.getDate()+' '+b[d.getMonth()]+' '+d.getFullYear();
})();

/* ── Chart ── */
const chartData = [
  { label: 'Sen', value: 21 },
  { label: 'Sel', value: 29 },
  { label: 'Rab', value: 34 },
  { label: 'Kam', value: 29 },
  { label: 'Jum', value: 18 },
  { label: 'Sab', value: 26 },
  { label: 'Min', value: 14 },
];

const MAX_VALUE = 35;
const barsEl   = document.getElementById('chartBars');
const labelsEl = document.getElementById('chartLabels');

if (barsEl && labelsEl) {
  chartData.forEach(d => {
    const heightPct = (d.value / MAX_VALUE) * 100;
    const col = document.createElement('div');
    col.className = 'chart-bar-col';
    col.innerHTML = `<div class="chart-bar" style="height:${heightPct}%;"></div>`;
    barsEl.appendChild(col);
    const lbl = document.createElement('div');
    lbl.className = 'chart-x-label';
    lbl.textContent = d.label;
    labelsEl.appendChild(lbl);
  });
}
