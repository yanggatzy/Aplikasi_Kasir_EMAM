console.log('MANAGER DASHBOARD JS LOADED');

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
  { label: 'Jum', value: 24 },
  { label: 'Sab', value: 35 },
  { label: 'Min', value: 31 },
];

const expenseData = [
  { label:'Sen', value:8 },
  { label:'Sel', value:12 },
  { label:'Rab', value:10 },
  { label:'Kam', value:15 },
  { label:'Jum', value:9 },
  { label:'Sab', value:18 },
  { label:'Min', value:13 }
];

const MAX_VALUE = 35;
const barsEl   = document.getElementById('chartBars');
const labelsEl = document.getElementById('chartLabels');

if (barsEl && labelsEl) {
  const chartHeight = 340;

chartData.forEach(d => {
  const heightPx = (d.value / MAX_VALUE) * chartHeight;

  const col = document.createElement('div');
  col.className = 'chart-bar-col';

  col.innerHTML = `
    <div class="chart-bar" style="height:${heightPx}px"></div>
  `;

  barsEl.appendChild(col);

  const lbl = document.createElement('div');
  lbl.className = 'chart-x-label';
  lbl.textContent = d.label;

  labelsEl.appendChild(lbl);
});
}