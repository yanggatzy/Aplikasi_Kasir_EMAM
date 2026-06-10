/* ── Tanggal Dinamis ── */
(function(){
  const b=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const d=new Date();
  document.getElementById('currentDate').textContent=d.getDate()+' '+b[d.getMonth()]+' '+d.getFullYear();
})();

/* ── Chart Data ── */
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
