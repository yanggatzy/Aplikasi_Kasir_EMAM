<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan - Emam Manager</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/manager.css', 'resources/js/manager-laporan.js'])
</head>
<body>
<div class="app">

  <aside class="sidebar">
    <div class="sidebar-logo">
      <div class="logo-icon"><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
      <div class="logo-text"><div class="brand">Emam</div><div class="sub">Manager</div></div>
    </div>
    <nav class="sidebar-nav">
      <a href="{{ route('manager.dashboard') }}" class="nav-item"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M0 10V0H8V10H0ZM0 18V12H8V18H0ZM10 18V8H18V18H10ZM10 6V0H18V6H10Z" fill="#594238"/></svg><span>Dashboard</span></a>
      <a href="{{ route('manager.kategori') }}" class="nav-item"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M0 8V0H8V8H0ZM0 18V10H8V18H0ZM10 8V0H18V8H10ZM10 18V10H18V18H10ZM12 6H16V2H12V6ZM12 16H16V12H12V16ZM2 6H6V2H2V6ZM2 16H6V12H2V16Z" fill="#594238"/></svg><span>Kategori</span></a>
      <a href="{{ route('manager.menu') }}" class="nav-item"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 6C4.45 6 3.97917 5.80417 3.5875 5.4125C3.19583 5.02083 3 4.55 3 4V2C3 1.45 3.19583 0.979167 3.5875 0.5875C3.97917 0.195833 4.45 0 5 0H15C15.55 0 16.0208 0.195833 16.4125 0.5875C16.8042 0.979167 17 1.45 17 2V4C17 4.55 16.8042 5.02083 16.4125 5.4125C16.0208 5.80417 15.55 6 15 6H5V6M5 4H15V2H5V4ZM2 20C1.45 20 0.979167 19.8042 0.5875 19.4125C0.195833 19.0208 0 18.55 0 18V17H20V18C20 18.55 19.8042 19.0208 19.4125 19.4125C19.0208 19.8042 18.55 20 18 20H2ZM0 16L3.475 8.175C3.64167 7.80833 3.89167 7.52083 4.225 7.3125C4.55833 7.10417 4.91667 7 5.3 7H14.7C15.0833 7 15.4417 7.10417 15.775 7.3125C16.1083 7.52083 16.3583 7.80833 16.525 8.175L20 16H0Z" fill="#594238"/></svg><span>Menu</span></a>
      <a href="{{ route('manager.meja') }}" class="nav-item"><svg width="20" height="16" viewBox="0 0 20 16" fill="none"><path d="M2.31288 5H17.6629L16.8129 2H3.18788L2.31288 5ZM14.7879 7H5.21288L4.93788 9H15.0379L14.7879 7ZM1.98788 16L3.21288 7H0.987879C0.654545 7 0.392045 6.86667 0.200379 6.6C0.00871213 6.33333 -0.0454545 6.04167 0.0378788 5.725L1.46288 0.725C1.52955 0.508333 1.64621 0.333333 1.81288 0.2C1.97955 0.0666667 2.17955 0 2.41288 0H17.5629C17.7962 0 17.9962 0.0666667 18.1629 0.2C18.3295 0.333333 18.4462 0.508333 18.5129 0.725L19.9379 5.725C20.0212 6.04167 19.967 6.33333 19.7754 6.6C19.5837 6.86667 19.3212 7 18.9879 7H16.7879L17.9879 16H15.9879L15.3129 11H4.66288L3.98788 16H1.98788Z" fill="#594238"/></svg><span>Manajemen Meja</span></a>
      <a href="{{ route('manager.user') }}" class="nav-item"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 9C7.625 9 6.44792 8.51042 5.46875 7.53125C4.48958 6.55208 4 5.375 4 4C4 2.625 4.48958 1.44792 5.46875 0.46875C6.44792 -0.510417 7.625 -1 9 -1C10.375 -1 11.5521 -0.510417 12.5312 0.46875C13.5104 1.44792 14 2.625 14 4C14 5.375 13.5104 6.55208 12.5312 7.53125C11.5521 8.51042 10.375 9 9 9ZM-1 18V15.2C-1 14.5167 -0.822917 13.8875 -0.46875 13.3125C-0.114583 12.7375 0.358333 12.3 0.95 12C2.21667 11.3667 3.50417 10.8958 4.8125 10.5875C6.12083 10.2792 7.55 10.125 9 10.125C10.45 10.125 11.7542 10.2792 12.9125 10.5875C14.0708 10.8958 15.3583 11.3667 16.775 12C17.2917 12.3 17.7208 12.7375 18.0625 13.3125C18.4042 13.8875 18.575 14.5167 18.575 15.2V18H-1ZM1 16H17V15.2C17 14.9667 16.9458 14.75 16.8375 14.55C16.7292 14.35 16.5833 14.2 16.4 14.1C15.2833 13.5333 14.1292 13.1042 12.9375 12.8125C11.7458 12.5208 10.4417 12.375 9.025 12.375C7.60833 12.375 6.29583 12.5208 5.0875 12.8125C3.87917 13.1042 2.71667 13.5333 1.6 14.1C1.41667 14.2 1.27083 14.35 1.1625 14.55C1.05417 14.75 1 14.9667 1 15.2V16ZM9 7C9.825 7 10.5312 6.70417 11.1188 6.1125C11.7062 5.52083 12 4.8 12 3.975C12 3.15 11.7062 2.44375 11.1188 1.85625C10.5312 1.26875 9.825 0.975 9 0.975C8.175 0.975 7.46875 1.26875 6.88125 1.85625C6.29375 2.44375 6 3.15 6 3.975C6 4.8 6.29375 5.52083 6.88125 6.1125C7.46875 6.70417 8.175 7 9 7Z" fill="#594238"/></svg><span>Tambah User</span></a>
      <a href="{{ route('manager.transaksi') }}" class="nav-item"><svg width="18" height="20" viewBox="0 0 18 20" fill="none"><path d="M3 20C2.16667 20 1.45833 19.7083 0.875 19.125C0.291667 18.5417 0 17.8333 0 17V14H3V0L4.5 1.5L6 0L7.5 1.5L9 0L10.5 1.5L12 0L13.5 1.5L15 0L16.5 1.5L18 0V17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20H3ZM15 18C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17V3H5V14H14V17C14 17.2833 14.0958 17.5208 14.2875 17.7125C14.4792 17.9042 14.7167 18 15 18ZM6 7V5H12V7H6ZM6 10V8H12V10H6ZM14 7C13.7167 7 13.4792 6.90417 13.2875 6.7125C13.0958 6.52083 13 6.28333 13 6C13 5.71667 13.0958 5.47917 13.2875 5.2875C13.4792 5.09583 13.7167 5 14 5C14.2833 5 14.5208 5.09583 14.7125 5.2875C14.9042 5.47917 15 5.71667 15 6C15 6.28333 14.9042 6.52083 14.7125 6.7125C14.5208 6.90417 14.2833 7 14 7ZM3 18H12V16H2V17C2 17.2833 2.09583 17.5208 2.2875 17.7125C2.47917 17.9042 2.71667 18 3 18Z" fill="#594238"/></svg><span>Riwayat Transaksi</span></a>
      <a href="{{ route('manager.laporan') }}" class="nav-item active"><svg width="18" height="22" viewBox="0 0 18 22" fill="none"><path d="M6 16H12V14H6V16ZM6 12H12V10H6V12ZM4 20C3.45 20 2.97917 19.8042 2.5875 19.4125C2.19583 19.0208 2 18.55 2 18V4C2 3.45 2.19583 2.97917 2.5875 2.5875C2.97917 2.19583 3.45 2 4 2H10L16 8V18C16 18.55 15.8042 19.0208 15.4125 19.4125C15.0208 19.8042 14.55 20 14 20H4ZM9 9V4H4V18H14V9H9Z" fill="#D35400"/></svg><span>Laporan</span></a>
    </nav>
    <div class="sidebar-footer">
      <div class="user-row"><div class="user-avatar"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="#594238"/></svg></div><span class="user-label">Manager</span></div>
      <button onclick="document.getElementById('logoutModal').classList.remove('hidden')" class="nav-item" style="width:100%;text-align:left;background:none;border:none;cursor:pointer;"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H9V2H2V16H9V18H2ZM13 14L11.625 12.55L14.175 10H6V8H14.175L11.625 5.45L13 4L18 9L13 14Z" fill="#D35400"/></svg><span>Keluar</span></button>
    </div>
  </aside>

  <div id="logoutModal" class="modal-overlay hidden">
    <div class="modal-card modal-card-sm">
      <div class="modal-icon-wrap"><svg width="22" height="22" viewBox="0 0 18 18" fill="none"><path d="M2 18C1.45 18 0.979 17.804 0.588 17.413C0.196 17.021 0 16.55 0 16V2C0 1.45 0.196 0.979 0.588 0.588C0.979 0.196 1.45 0 2 0H9V2H2V16H9V18H2ZM13 14L11.625 12.55L14.175 10H6V8H14.175L11.625 5.45L13 4L18 9L13 14Z" fill="#1C1C1C"/></svg></div>
      <p class="modal-title">Yakin ingin keluar?</p>
      <p class="modal-subtitle">Apa anda yakin ingin keluar</p>
      <div class="modal-btn-row" style="margin-top:0;">
        <button onclick="document.getElementById('logoutModal').classList.add('hidden')" class="btn-modal-cancel">Batal</button>
        <form method="POST" action="{{ route('logout') }}" style="flex:1;">@csrf<button type="submit" class="btn-modal-submit" style="width:100%;">Keluar</button></form>
      </div>
    </div>
  </div>

  <main class="main">
    <div class="topbar">
      <div class="search-wrap">
        <div class="search-icon"><svg width="16" height="16" viewBox="0 0 18 24" fill="none"><path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.14583 12.3708 1.8875 11.1125C0.629167 9.85417 0 8.31667 0 6.5C0 4.68333 0.629167 3.14583 1.8875 1.8875C3.14583 0.629167 4.68333 0 6.5 0C8.31667 0 9.85417 0.629167 11.1125 1.8875C12.3708 3.14583 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.8125 10.5625 9.6875 9.6875C10.5625 8.8125 11 7.75 11 6.5C11 5.25 10.5625 4.1875 9.6875 3.3125C8.8125 2.4375 7.75 2 6.5 2C5.25 2 4.1875 2.4375 3.3125 3.3125C2.4375 4.1875 2 5.25 2 6.5C2 7.75 2.4375 8.8125 3.3125 9.6875C4.1875 10.5625 5.25 11 6.5 11Z" fill="#594238"/></svg></div>
        <input class="search-input" type="text" placeholder="Cari laporan ...">
      </div>
      <div class="date-badge">
        <svg width="14" height="15" viewBox="0 0 14 15" fill="none"><path d="M1.5 15C1.0875 15 0.734375 14.8531 0.440625 14.5594C0.146875 14.2656 0 13.9125 0 13.5V3C0 2.5875 0.146875 2.23437 0.440625 1.94062C0.734375 1.64687 1.0875 1.5 1.5 1.5H2.25V0H3.75V1.5H9.75V0H11.25V1.5H12C12.4125 1.5 12.7656 1.64687 13.0594 1.94062C13.3531 2.23437 13.5 2.5875 13.5 3V13.5C13.5 13.9125 13.3531 14.2656 13.0594 14.5594C12.7656 14.8531 12.4125 15 12 15H1.5ZM1.5 13.5H12V6H1.5V13.5ZM1.5 4.5H12V3H1.5V4.5Z" fill="#D35400"/></svg>
        <span id="currentDate"></span>
      </div>
    </div>

    <div class="content">
      <div class="page-header">
        <div class="page-header-left">
          <h1>Laporan Penjualan</h1>
          <p>Pantau performa penjualan dan pendapatan harian outlet Anda.</p>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
          <div style="display:flex;align-items:center;gap:8px;padding:9px 14px;border:1px solid var(--border);border-radius:8px;background:#fff;font-size:13px;color:var(--text-mid);">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none"><path d="M1.5 15C1.0875 15 0.734375 14.8531 0.440625 14.5594C0.146875 14.2656 0 13.9125 0 13.5V3C0 2.5875 0.146875 2.23437 0.440625 1.94062C0.734375 1.64687 1.0875 1.5 1.5 1.5H2.25V0H3.75V1.5H9.75V0H11.25V1.5H12C12.4125 1.5 12.7656 1.64687 13.0594 1.94062C13.3531 2.23437 13.5 2.5875 13.5 3V13.5C13.5 13.9125 13.3531 14.2656 13.0594 14.5594C12.7656 14.8531 12.4125 15 12 15H1.5ZM1.5 13.5H12V6H1.5V13.5ZM1.5 4.5H12V3H1.5V4.5Z" fill="#594238"/></svg>
            Mei 2024
          </div>
          <button class="btn-primary" style="padding:9px 20px;">Filter</button>
        </div>
      </div>

      <!-- Stat Cards -->
      <div class="stat-grid-4">
        <div class="stat-card">
          <div class="stat-icon-box" style="background:#FEF3C7;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M10 10C8.33 10 6.9 9.42 5.7 8.25C4.5 7.08 3.9 5.67 3.9 4C3.9 2.33 4.5 0.92 5.7 -0.25C6.9 -1.42 8.33 -2 10 -2C11.67 -2 13.1 -1.42 14.3 -0.25C15.5 0.92 16.1 2.33 16.1 4V5H18V7H2V5H3.9V4C3.9 2.33 4.5 0.92 5.7 -0.25C6.9 -1.42 8.33 -2 10 -2ZM2 9H18V18C18 18.55 17.8 19.02 17.4 19.42C17 19.82 16.53 20 16 20H4C3.47 20 3 19.82 2.6 19.42C2.2 19.02 2 18.55 2 18V9ZM8 12V17H10V12H8ZM12 12V17H14V12H12ZM6 12V17H8V12H6Z" fill="#D97706"/></svg>
          </div>
          <div>
            <div class="stat-label">Total Pendapatan</div>
            <div class="stat-value" style="font-size:18px;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon-box">
            <svg width="18" height="20" viewBox="0 0 18 20" fill="none"><path d="M3 20C2.16667 20 1.45833 19.7083 0.875 19.125C0.291667 18.5417 0 17.8333 0 17V14H3V0L4.5 1.5L6 0L7.5 1.5L9 0L10.5 1.5L12 0L13.5 1.5L15 0L16.5 1.5L18 0V17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20H3ZM15 18C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17V3H5V14H14V17C14 17.2833 14.0958 17.5208 14.2875 17.7125C14.4792 17.9042 14.7167 18 15 18ZM6 7V5H12V7H6ZM6 10V8H12V10H6ZM14 7C13.7167 7 13.4792 6.90417 13.2875 6.7125C13.0958 6.52083 13 6.28333 13 6C13 5.71667 13.0958 5.47917 13.2875 5.2875C13.4792 5.09583 13.7167 5 14 5C14.2833 5 14.5208 5.09583 14.7125 5.2875C14.9042 5.47917 15 5.71667 15 6C15 6.28333 14.9042 6.52083 14.7125 6.7125C14.5208 6.90417 14.2833 7 14 7ZM3 18H12V16H2V17C2 17.2833 2.09583 17.5208 2.2875 17.7125C2.47917 17.9042 2.71667 18 3 18Z" fill="#D35400"/></svg>
          </div>
          <div>
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-value">{{ number_format($totalTransaksi, 0, ',', '.') }}</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon-box" style="background:#DCFCE7;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M7 18C6.16667 18 5.45833 17.7083 4.875 17.125C4.29167 16.5417 4 15.8333 4 15V9C4 8.16667 4.29167 7.45833 4.875 6.875C5.45833 6.29167 6.16667 6 7 6H17C17.8333 6 18.5417 6.29167 19.125 6.875C19.7083 7.45833 20 8.16667 20 9V15C20 15.8333 19.7083 16.5417 19.125 17.125C18.5417 17.7083 17.8333 18 17 18H7ZM9 9L12 7L15 9V15H13V11.5L12 12L11 11.5V15H9V9Z" fill="#16A34A"/></svg>
          </div>
          <div>
            <div class="stat-label">Menu Tersedia</div>
            <div class="stat-value">{{ $totalMenuAktif }}</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon-box" style="background:#DBEAFE;">
            <svg width="24" height="16" viewBox="0 0 24 16" fill="none"><path d="M12.5 7.95C12.9833 7.41667 13.3542 6.80833 13.6125 6.125C13.8708 5.44167 14 4.73333 14 4C14 3.26667 13.8708 2.55833 13.6125 1.875C13.3542 1.19167 12.9833 0.583333 12.5 0.05C13.5 0.183333 14.3333 0.625 15 1.375C15.6667 2.125 16 3 16 4C16 5 15.6667 5.875 15 6.625C14.3333 7.375 13.5 7.81667 12.5 7.95ZM18 16V13C18 12.4 17.8667 11.8292 17.6 11.2875C17.3333 10.7458 16.9833 10.2667 16.55 9.85C17.4 10.15 18.1875 10.5375 18.9125 11.0125C19.6375 11.4875 20 12.15 20 13V16H18ZM20 9V7H18V5H20V3H22V5H24V7H22V9H20ZM8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="#1D4ED8"/></svg>
          </div>
          <div>
            <div class="stat-label">Total Meja</div>
            <div class="stat-value">{{ $totalMeja }}</div>
          </div>
        </div>
      </div>

      <div class="table-card">
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>TANGGAL</th>
                <th>JUMLAH TRANSAKSI</th>
                <th>TOTAL PENDAPATAN</th>
                <th>STATUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div style="font-weight:700;">Hari ini, 25 Oct</div>
                  <div style="display:flex;align-items:center;gap:4px;margin-top:2px;"><span style="width:8px;height:8px;border-radius:50%;background:var(--orange);display:inline-block;"></span><span style="font-size:11px;color:var(--orange);font-weight:600;">IN SESSION</span></div>
                </td>
                <td>84 Orders</td>
                <td style="font-weight:700;">Rp 9.840.000</td>
                <td><span class="badge badge-success"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="4" fill="#16A34A"/></svg>SUCCESS</span></td>
                <td>
                  <a href="{{ route('manager.detail-laporan') }}" class="btn-outline" style="text-decoration:none;">
                    <svg width="14" height="14" viewBox="0 0 22 16" fill="none"><path d="M11 12.5C12.25 12.5 13.3125 12.0625 14.1875 11.1875C15.0625 10.3125 15.5 9.25 15.5 8C15.5 6.75 15.0625 5.6875 14.1875 4.8125C13.3125 3.9375 12.25 3.5 11 3.5C9.75 3.5 8.6875 3.9375 7.8125 4.8125C6.9375 5.6875 6.5 6.75 6.5 8C6.5 9.25 6.9375 10.3125 7.8125 11.1875C8.6875 12.0625 9.75 12.5 11 12.5ZM11 10.7C10.25 10.7 9.6125 10.4375 9.0875 9.9125C8.5625 9.3875 8.3 8.75 8.3 8C8.3 7.25 8.5625 6.6125 9.0875 6.0875C9.6125 5.5625 10.25 5.3 11 5.3C11.75 5.3 12.3875 5.5625 12.9125 6.0875C13.4375 6.6125 13.7 7.25 13.7 8C13.7 8.75 13.4375 9.3875 12.9125 9.9125C12.3875 10.4375 11.75 10.7 11 10.7ZM11 14C8.56667 14 6.35 13.3208 4.35 11.9625C2.35 10.6042 0.933333 8.76667 0.1 6.45C0.933333 4.11667 2.35 2.27917 4.35 0.920833C6.35 -0.4375 8.56667 -1.1125 11 -1.1125C13.4333 -1.1125 15.65 -0.4375 17.65 0.920833C19.65 2.27917 21.0667 4.11667 21.9 6.45C21.0667 8.76667 19.65 10.6042 17.65 11.9625C15.65 13.3208 13.4333 14 11 14Z" fill="#594238"/></svg>
                    Detail
                  </a>
                </td>
              </tr>
              @php
              $laporanRows = [
                ['24 Oct 2023','Closed at 23:45',142,'Rp 18.450.000'],
                ['23 Oct 2023','Closed at 23:50',138,'Rp 16.200.000'],
                ['22 Oct 2023','Closed at 23:40',155,'Rp 20.100.000'],
                ['21 Oct 2023','Closed at 23:45',121,'Rp 14.800.000'],
                ['20 Oct 2023','Closed at 23:55',167,'Rp 22.450.000'],
                ['19 Oct 2023','Closed at 23:45',145,'Rp 19.320.000'],
                ['18 Oct 2023','Closed at 23:50',130,'Rp 15.780.000'],
              ];
              @endphp
              @foreach($laporanRows as $row)
              <tr>
                <td>
                  <div style="font-weight:700;">{{ $row[0] }}</div>
                  <div style="font-size:11px;color:#8D7B72;">{{ $row[1] }}</div>
                </td>
                <td>{{ $row[2] }} Orders</td>
                <td style="font-weight:700;">{{ $row[3] }}</td>
                <td><span class="badge badge-success"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="4" fill="#16A34A"/></svg>SUCCESS</span></td>
                <td>
                  <a href="{{ route('manager.detail-laporan') }}" class="btn-outline" style="text-decoration:none;">
                    <svg width="14" height="14" viewBox="0 0 22 16" fill="none"><path d="M11 12.5C12.25 12.5 13.3125 12.0625 14.1875 11.1875C15.0625 10.3125 15.5 9.25 15.5 8C15.5 6.75 15.0625 5.6875 14.1875 4.8125C13.3125 3.9375 12.25 3.5 11 3.5C9.75 3.5 8.6875 3.9375 7.8125 4.8125C6.9375 5.6875 6.5 6.75 6.5 8C6.5 9.25 6.9375 10.3125 7.8125 11.1875C8.6875 12.0625 9.75 12.5 11 12.5ZM11 10.7C10.25 10.7 9.6125 10.4375 9.0875 9.9125C8.5625 9.3875 8.3 8.75 8.3 8C8.3 7.25 8.5625 6.6125 9.0875 6.0875C9.6125 5.5625 10.25 5.3 11 5.3C11.75 5.3 12.3875 5.5625 12.9125 6.0875C13.4375 6.6125 13.7 7.25 13.7 8C13.7 8.75 13.4375 9.3875 12.9125 9.9125C12.3875 10.4375 11.75 10.7 11 10.7ZM11 14C8.56667 14 6.35 13.3208 4.35 11.9625C2.35 10.6042 0.933333 8.76667 0.1 6.45C0.933333 4.11667 2.35 2.27917 4.35 0.920833C6.35 -0.4375 8.56667 -1.1125 11 -1.1125C13.4333 -1.1125 15.65 -0.4375 17.65 0.920833C19.65 2.27917 21.0667 4.11667 21.9 6.45C21.0667 8.76667 19.65 10.6042 17.65 11.9625C15.65 13.3208 13.4333 14 11 14Z" fill="#594238"/></svg>
                    Detail
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>

<button class="btn-float" onclick="window.print()">
  <svg width="16" height="16" viewBox="0 0 20 20" fill="none"><path d="M4 16C3.45 16 2.97917 15.8042 2.5875 15.4125C2.19583 15.0208 2 14.55 2 14V11H4V14H16V11H18V14C18 14.55 17.8042 15.0208 17.4125 15.4125C17.0208 15.8042 16.55 16 16 16H4ZM10 13L6 9L7.4 7.55L9 9.15V4H11V9.15L12.6 7.55L14 9L10 13ZM4 8V6H2V4C2 3.45 2.19583 2.97917 2.5875 2.5875C2.97917 2.19583 3.45 2 4 2H16C16.55 2 17.0208 2.19583 17.4125 2.5875C17.8042 2.97917 18 3.45 18 4V6H16V4H4V6H2V8H4Z" fill="#fff"/></svg>
  Unduh PDF Laporan
</button>
</body>
</html>
