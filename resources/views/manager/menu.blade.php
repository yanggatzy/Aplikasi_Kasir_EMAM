<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu - Emam Manager</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/manager.css', 'resources/js/manager-menu.js'])
</head>
<body>
<div class="app">

  <!-- ── SIDEBAR ── -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <div class="logo-icon"><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
      <div class="logo-text"><div class="brand">Emam</div><div class="sub">Manager</div></div>
    </div>
    <nav class="sidebar-nav">
      <a href="{{ route('manager.dashboard') }}" class="nav-item">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M0 10V0H8V10H0ZM0 18V12H8V18H0ZM10 18V8H18V18H10ZM10 6V0H18V6H10Z" fill="#594238"/></svg>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('manager.kategori') }}" class="nav-item">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M0 8V0H8V8H0ZM0 18V10H8V18H0ZM10 8V0H18V8H10ZM10 18V10H18V18H10ZM12 6H16V2H12V6ZM12 16H16V12H12V16ZM2 6H6V2H2V6ZM2 16H6V12H2V16Z" fill="#594238"/></svg>
        <span>Kategori</span>
      </a>
      <a href="{{ route('manager.menu') }}" class="nav-item active">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 6C4.45 6 3.97917 5.80417 3.5875 5.4125C3.19583 5.02083 3 4.55 3 4V2C3 1.45 3.19583 0.979167 3.5875 0.5875C3.97917 0.195833 4.45 0 5 0H15C15.55 0 16.0208 0.195833 16.4125 0.5875C16.8042 0.979167 17 1.45 17 2V4C17 4.55 16.8042 5.02083 16.4125 5.4125C16.0208 5.80417 15.55 6 15 6H5V6M5 4H15V2H5V4ZM2 20C1.45 20 0.979167 19.8042 0.5875 19.4125C0.195833 19.0208 0 18.55 0 18V17H20V18C20 18.55 19.8042 19.0208 19.4125 19.4125C19.0208 19.8042 18.55 20 18 20H2ZM0 16L3.475 8.175C3.64167 7.80833 3.89167 7.52083 4.225 7.3125C4.55833 7.10417 4.91667 7 5.3 7H14.7C15.0833 7 15.4417 7.10417 15.775 7.3125C16.1083 7.52083 16.3583 7.80833 16.525 8.175L20 16H0Z" fill="#D35400"/></svg>
        <span>Menu</span>
      </a>
      <a href="{{ route('manager.meja') }}" class="nav-item">
        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"><path d="M2.31288 5H17.6629L16.8129 2H3.18788L2.31288 5ZM14.7879 7H5.21288L4.93788 9H15.0379L14.7879 7ZM1.98788 16L3.21288 7H0.987879C0.654545 7 0.392045 6.86667 0.200379 6.6C0.00871213 6.33333 -0.0454545 6.04167 0.0378788 5.725L1.46288 0.725C1.52955 0.508333 1.64621 0.333333 1.81288 0.2C1.97955 0.0666667 2.17955 0 2.41288 0H17.5629C17.7962 0 17.9962 0.0666667 18.1629 0.2C18.3295 0.333333 18.4462 0.508333 18.5129 0.725L19.9379 5.725C20.0212 6.04167 19.967 6.33333 19.7754 6.6C19.5837 6.86667 19.3212 7 18.9879 7H16.7879L17.9879 16H15.9879L15.3129 11H4.66288L3.98788 16H1.98788Z" fill="#594238"/></svg>
        <span>Manajemen Meja</span>
      </a>
      <a href="{{ route('manager.user') }}" class="nav-item">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 9C7.625 9 6.44792 8.51042 5.46875 7.53125C4.48958 6.55208 4 5.375 4 4C4 2.625 4.48958 1.44792 5.46875 0.46875C6.44792 -0.510417 7.625 -1 9 -1C10.375 -1 11.5521 -0.510417 12.5312 0.46875C13.5104 1.44792 14 2.625 14 4C14 5.375 13.5104 6.55208 12.5312 7.53125C11.5521 8.51042 10.375 9 9 9ZM-1 18V15.2C-1 14.5167 -0.822917 13.8875 -0.46875 13.3125C-0.114583 12.7375 0.358333 12.3 0.95 12C2.21667 11.3667 3.50417 10.8958 4.8125 10.5875C6.12083 10.2792 7.55 10.125 9 10.125C10.45 10.125 11.7542 10.2792 12.9125 10.5875C14.0708 10.8958 15.3583 11.3667 16.775 12C17.2917 12.3 17.7208 12.7375 18.0625 13.3125C18.4042 13.8875 18.575 14.5167 18.575 15.2V18H-1ZM1 16H17V15.2C17 14.9667 16.9458 14.75 16.8375 14.55C16.7292 14.35 16.5833 14.2 16.4 14.1C15.2833 13.5333 14.1292 13.1042 12.9375 12.8125C11.7458 12.5208 10.4417 12.375 9.025 12.375C7.60833 12.375 6.29583 12.5208 5.0875 12.8125C3.87917 13.1042 2.71667 13.5333 1.6 14.1C1.41667 14.2 1.27083 14.35 1.1625 14.55C1.05417 14.75 1 14.9667 1 15.2V16ZM9 7C9.825 7 10.5312 6.70417 11.1188 6.1125C11.7062 5.52083 12 4.8 12 3.975C12 3.15 11.7062 2.44375 11.1188 1.85625C10.5312 1.26875 9.825 0.975 9 0.975C8.175 0.975 7.46875 1.26875 6.88125 1.85625C6.29375 2.44375 6 3.15 6 3.975C6 4.8 6.29375 5.52083 6.88125 6.1125C7.46875 6.70417 8.175 7 9 7Z" fill="#594238"/></svg>
        <span>Tambah User</span>
      </a>
      <a href="{{ route('manager.transaksi') }}" class="nav-item">
        <svg width="18" height="20" viewBox="0 0 18 20" fill="none"><path d="M3 20C2.16667 20 1.45833 19.7083 0.875 19.125C0.291667 18.5417 0 17.8333 0 17V14H3V0L4.5 1.5L6 0L7.5 1.5L9 0L10.5 1.5L12 0L13.5 1.5L15 0L16.5 1.5L18 0V17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20H3ZM15 18C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17V3H5V14H14V17C14 17.2833 14.0958 17.5208 14.2875 17.7125C14.4792 17.9042 14.7167 18 15 18ZM6 7V5H12V7H6ZM6 10V8H12V10H6ZM14 7C13.7167 7 13.4792 6.90417 13.2875 6.7125C13.0958 6.52083 13 6.28333 13 6C13 5.71667 13.0958 5.47917 13.2875 5.2875C13.4792 5.09583 13.7167 5 14 5C14.2833 5 14.5208 5.09583 14.7125 5.2875C14.9042 5.47917 15 5.71667 15 6C15 6.28333 14.9042 6.52083 14.7125 6.7125C14.5208 6.90417 14.2833 7 14 7ZM3 18H12V16H2V17C2 17.2833 2.09583 17.5208 2.2875 17.7125C2.47917 17.9042 2.71667 18 3 18Z" fill="#594238"/></svg>
        <span>Riwayat Transaksi</span>
      </a>
      <a href="{{ route('manager.laporan') }}" class="nav-item">
        <svg width="18" height="22" viewBox="0 0 18 22" fill="none"><path d="M6 16H12V14H6V16ZM6 12H12V10H6V12ZM4 20C3.45 20 2.97917 19.8042 2.5875 19.4125C2.19583 19.0208 2 18.55 2 18V4C2 3.45 2.19583 2.97917 2.5875 2.5875C2.97917 2.19583 3.45 2 4 2H10L16 8V18C16 18.55 15.8042 19.0208 15.4125 19.4125C15.0208 19.8042 14.55 20 14 20H4ZM9 9V4H4V18H14V9H9Z" fill="#594238"/></svg>
        <span>Laporan</span>
      </a>
    </nav>
    <div class="sidebar-footer">
      <div class="user-row">
        <div class="user-avatar">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="#594238"/></svg>
        </div>
        <span class="user-label">Manager</span>
      </div>
      <button onclick="document.getElementById('logoutModal').classList.remove('hidden')" class="nav-item" style="width:100%;text-align:left;background:none;border:none;cursor:pointer;">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H9V2H2V16H9V18H2ZM13 14L11.625 12.55L14.175 10H6V8H14.175L11.625 5.45L13 4L18 9L13 14Z" fill="#D35400"/></svg>
        <span>Keluar</span>
      </button>
    </div>
  </aside>

  {{-- Logout Modal --}}
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

  <!-- ── MAIN ── -->
  <main class="main">
    <div class="topbar">
      <div class="search-wrap">
        <div class="search-icon">
          <svg width="16" height="16" viewBox="0 0 18 24" fill="none"><path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.14583 12.3708 1.8875 11.1125C0.629167 9.85417 0 8.31667 0 6.5C0 4.68333 0.629167 3.14583 1.8875 1.8875C3.14583 0.629167 4.68333 0 6.5 0C8.31667 0 9.85417 0.629167 11.1125 1.8875C12.3708 3.14583 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.8125 10.5625 9.6875 9.6875C10.5625 8.8125 11 7.75 11 6.5C11 5.25 10.5625 4.1875 9.6875 3.3125C8.8125 2.4375 7.75 2 6.5 2C5.25 2 4.1875 2.4375 3.3125 3.3125C2.4375 4.1875 2 5.25 2 6.5C2 7.75 2.4375 8.8125 3.3125 9.6875C4.1875 10.5625 5.25 11 6.5 11Z" fill="#594238"/></svg>
        </div>
        <input class="search-input" type="text" placeholder="Cari menu ...">
      </div>
      <div class="date-badge">
        <svg width="14" height="15" viewBox="0 0 14 15" fill="none"><path d="M1.5 15C1.0875 15 0.734375 14.8531 0.440625 14.5594C0.146875 14.2656 0 13.9125 0 13.5V3C0 2.5875 0.146875 2.23437 0.440625 1.94062C0.734375 1.64687 1.0875 1.5 1.5 1.5H2.25V0H3.75V1.5H9.75V0H11.25V1.5H12C12.4125 1.5 12.7656 1.64687 13.0594 1.94062C13.3531 2.23437 13.5 2.5875 13.5 3V13.5C13.5 13.9125 13.3531 14.2656 13.0594 14.5594C12.7656 14.8531 12.4125 15 12 15H1.5ZM1.5 13.5H12V6H1.5V13.5ZM1.5 4.5H12V3H1.5V4.5Z" fill="#D35400"/></svg>
        <span id="currentDate"></span>
      </div>
    </div>

    <div class="content">
      <div class="page-header">
        <div class="page-header-left">
          <h1>Manajemen Menu</h1>
          <p>Kelola daftar menu makanan dan minuman restoran Anda.</p>
        </div>
        <button class="btn-primary" onclick="openModal('addMenuModal')">+ Tambah Menu Baru</button>
      </div>

      <!-- Category filter pills -->
      <div class="filter-pills" id="categoryPills">
        <button class="pill active" data-cat="all">Semua Menu</button>
        <button class="pill" data-cat="Makanan Utama">Makanan Utama</button>
        <button class="pill" data-cat="Minuman Dingin">Minuman Dingin</button>
        <button class="pill" data-cat="Appetizer">Appetizer</button>
        <button class="pill" data-cat="Dessert">Dessert</button>
        <button class="pill" data-cat="Minuman">Minuman</button>
      </div>

      <div class="table-card">
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>ITEM MENU</th>
                <th>KATEGORI</th>
                <th>HARGA (IDR)</th>
                <th>STATUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              @php
              $menuItems = [
                ['Nasi Goreng Spesial','Makanan Utama','20.000',true],
                ['Ayam Bakar Madu','Makanan Utama','42.000',true],
                ['Es Jeruk Peras','Minuman Dingin','6.000',true],
                ['Kentang Goreng','Appetizer','15.000',true],
                ['Pisang Keju','Dessert','16.000',false],
                ['Es Teh Manis','Minuman Dingin','6.000',true],
                ['Soto Ayam','Makanan Utama','18.000',true],
              ];
              @endphp
              @foreach($menuItems as $item)
              <tr data-cat="{{ $item[1] }}">
                <td>
                  <div style="display:flex;align-items:center;gap:12px;">
                    <img src="{{ asset('images/mieayam.png') }}" alt="{{ $item[0] }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;flex-shrink:0;">
                    <span style="font-weight:700;">{{ $item[0] }}</span>
                  </div>
                </td>
                <td style="color:#594238;">{{ $item[1] }}</td>
                <td style="color:var(--orange);font-weight:700;">{{ $item[2] }}</td>
                <td>
                  <label class="toggle-switch">
                    <input type="checkbox" {{ $item[3] ? 'checked' : '' }} onchange="handleToggle(this)">
                    <span class="toggle-track"></span>
                    <span class="toggle-label">{{ $item[3] ? 'Aktif' : 'Habis' }}</span>
                  </label>
                </td>
                <td>
                  <div style="display:flex;gap:6px;">
                    <button class="btn-icon" onclick="openModal('editMenuModal')" title="Edit">
                      <svg width="14" height="14" viewBox="0 0 20 20" fill="none"><path d="M2 18H3.4L13.025 8.375L11.625 6.975L2 16.6V18ZM0 20V15.75L13.025 2.75C13.225 2.56667 13.4458 2.42083 13.6875 2.3125C13.9292 2.20417 14.1833 2.15 14.45 2.15C14.7167 2.15 14.975 2.20417 15.225 2.3125C15.475 2.42083 15.6917 2.58333 15.875 2.8L17.25 4.2C17.4667 4.38333 17.6292 4.6 17.7375 4.85C17.8458 5.1 17.9 5.35 17.9 5.6C17.9 5.86667 17.8458 6.12083 17.7375 6.3625C17.6292 6.60417 17.4667 6.825 17.25 7.025L4.25 20H0ZM12.325 7.675L11.625 6.975L13.025 8.375L12.325 7.675Z" fill="#594238"/></svg>
                    </button>
                    <button class="btn-icon btn-danger" onclick="openModal('hapusMenuModal')" title="Hapus">
                      <svg width="14" height="14" viewBox="0 0 16 20" fill="none"><path d="M3 20C2.45 20 1.97917 19.8042 1.5875 19.4125C1.19583 19.0208 1 18.55 1 18V3H0V1H5V0H11V1H16V3H15V18C15 18.55 14.8042 19.0208 14.4125 19.4125C14.0208 19.8042 13.55 20 13 20H3ZM13 3H3V18H13V3ZM5 15H7V6H5V15ZM9 15H11V6H9V15Z" fill="#DC2626"/></svg>
                    </button>
                  </div>
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

<!-- Tambah Menu Modal -->
<div id="addMenuModal" class="modal-overlay hidden">
  <div class="modal-card">
    <p class="modal-title">Tambah Menu Baru</p>
    <div class="form-group">
      <label class="form-label">Item Menu</label>
      <input class="form-input" type="text" placeholder="Nama menu">
    </div>
    <div class="form-group">
      <label class="form-label">Kategori</label>
      <select class="form-select">
        <option>Makanan Utama</option>
        <option>Minuman</option>
        <option>Minuman Dingin</option>
        <option>Snacks</option>
        <option>Dessert</option>
        <option>Paket Hemat</option>
        <option>Appetizer</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-label">Harga</label>
      <div class="form-input-wrap">
        <span class="form-input-prefix">Rp</span>
        <input class="form-input has-prefix" type="number" placeholder="0" min="0">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Foto Menu</label>
      <div class="upload-area" id="uploadArea" onclick="document.getElementById('fotoInput').click()">
        <input type="file" id="fotoInput" accept="image/*" style="display:none;" onchange="previewImage(this)">
        <div class="upload-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16ZM6 20C5.45 20 4.97917 19.8042 4.5875 19.4125C4.19583 19.0208 4 18.55 4 18V15H6V18H18V15H20V18C20 18.55 19.8042 19.0208 19.4125 19.4125C19.0208 19.8042 18.55 20 18 20H6Z" fill="#D35400"/></svg>
        </div>
        <div class="upload-text">Klik untuk unggah foto menu</div>
        <img id="uploadPreview" src="" alt="" style="max-width:100%;border-radius:8px;display:none;margin-top:8px;">
      </div>
    </div>
    <div class="modal-btn-row">
      <button class="btn-modal-cancel" onclick="closeModal('addMenuModal')">Batal</button>
      <button class="btn-modal-submit" onclick="closeModal('addMenuModal')">Tambah Menu Baru</button>
    </div>
  </div>
</div>

<!-- Edit Menu Modal -->
<div id="editMenuModal" class="modal-overlay hidden">
  <div class="modal-card">
    <p class="modal-title">Edit Menu</p>
    <div class="form-group">
      <label class="form-label">Item Menu</label>
      <input class="form-input" type="text" value="Nasi Goreng Spesial">
    </div>
    <div class="form-group">
      <label class="form-label">Kategori</label>
      <select class="form-select">
        <option selected>Makanan Utama</option>
        <option>Minuman</option>
        <option>Minuman Dingin</option>
        <option>Snacks</option>
        <option>Dessert</option>
        <option>Paket Hemat</option>
        <option>Appetizer</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-label">Harga</label>
      <div class="form-input-wrap">
        <span class="form-input-prefix">Rp</span>
        <input class="form-input has-prefix" type="number" value="20000" min="0">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Foto Menu</label>
      <div class="upload-area">
        <img src="{{ asset('images/mieayam.png') }}" alt="current" style="width:80px;height:80px;border-radius:8px;object-fit:cover;">
        <div class="upload-text" style="font-size:11px;">Klik untuk ganti foto</div>
      </div>
    </div>
    <div class="modal-btn-row">
      <button class="btn-modal-cancel" onclick="closeModal('editMenuModal')">Batal</button>
      <button class="btn-modal-submit" onclick="closeModal('editMenuModal')">Simpan Perubahan</button>
    </div>
  </div>
</div>

<!-- Hapus Menu Modal -->
<div id="hapusMenuModal" class="modal-overlay hidden">
  <div class="modal-card modal-card-sm">
    <div class="modal-icon-wrap"><svg width="22" height="22" viewBox="0 0 16 20" fill="none"><path d="M3 20C2.45 20 1.97917 19.8042 1.5875 19.4125C1.19583 19.0208 1 18.55 1 18V3H0V1H5V0H11V1H16V3H15V18C15 18.55 14.8042 19.0208 14.4125 19.4125C14.0208 19.8042 13.55 20 13 20H3ZM13 3H3V18H13V3ZM5 15H7V6H5V15ZM9 15H11V6H9V15Z" fill="#1C1C1C"/></svg></div>
    <p class="modal-title">Hapus Menu?</p>
    <p class="modal-subtitle">Data menu akan dihapus permanen dan tidak bisa dipulihkan.</p>
    <div class="modal-btn-stack" style="margin-top:4px;">
      <button class="btn-hapus" onclick="closeModal('hapusMenuModal')">Hapus</button>
      <button class="btn-batal-pill" onclick="closeModal('hapusMenuModal')">Batal</button>
    </div>
  </div>
</div>
</body>
</html>
