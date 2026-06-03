<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Meja - Emam Kasir</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/status-meja.css')
</head>
<body>
<div class="app">

  <!-- ── SIDEBAR ── -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <div class="logo-icon">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
      </div>
      <div class="logo-text">
        <div class="brand">Emam</div>
        <div class="sub">Kasir</div>
      </div>
    </div>

    <nav class="sidebar-nav">
      <a href="{{ url('/kasir/dashboard') }}" class="nav-item">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
          <path d="M0 10V0H8V10H0ZM0 18V12H8V18H0ZM10 18V8H18V18H10ZM10 6V0H18V6H10Z" fill="#594238"/>
        </svg>
        <span>Dashboard</span>
      </a>
      <a href="{{ url('/kasir') }}" class="nav-item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M5 6C4.45 6 3.979 5.804 3.588 5.413C3.196 5.021 3 4.55 3 4V2C3 1.45 3.196 0.979 3.588 0.588C3.979 0.196 4.45 0 5 0H15C15.55 0 16.021 0.196 16.413 0.588C16.804 0.979 17 1.45 17 2V4C17 4.55 16.804 5.021 16.413 5.413C16.021 5.804 15.55 6 15 6H5ZM5 4H15V2H5V4ZM2 20C1.45 20 0.979 19.804 0.588 19.413C0.196 19.021 0 18.55 0 18V17H20V18C20 18.55 19.804 19.021 19.413 19.413C19.021 19.804 18.55 20 18 20H2ZM0 16L3.475 8.175C3.642 7.808 3.892 7.521 4.225 7.313C4.558 7.104 4.917 7 5.3 7H14.7C15.083 7 15.442 7.104 15.775 7.313C16.108 7.521 16.358 7.808 16.525 8.175L20 16H0Z" fill="#594238"/>
        </svg>
        <span>Kasir</span>
      </a>
      <a href="{{ url('/kasir/status-meja') }}" class="nav-item active">
        <svg width="20" height="16" viewBox="0 0 20 16" fill="none">
          <path d="M2.313 5H17.663L16.813 2H3.188L2.313 5ZM14.788 7H5.213L4.938 9H15.038L14.788 7ZM1.988 16L3.213 7H0.988C0.655 7 0.392 6.867 0.2 6.6C0.009 6.333 -0.045 6.042 0.038 5.725L1.463 0.725C1.53 0.508 1.646 0.333 1.813 0.2C1.98 0.067 2.18 0 2.413 0H17.563C17.796 0 17.996 0.067 18.163 0.2C18.33 0.333 18.446 0.508 18.513 0.725L19.938 5.725C20.021 6.042 19.967 6.333 19.775 6.6C19.584 6.867 19.321 7 18.988 7H16.788L17.988 16H15.988L15.313 11H4.663L3.988 16H1.988Z" fill="#D35400"/>
        </svg>
        <span>Status Meja</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <div class="user-row">
        <div class="user-avatar">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M8 8C6.9 8 5.958 7.608 5.175 6.825C4.392 6.042 4 5.1 4 4C4 2.9 4.392 1.958 5.175 1.175C5.958 0.392 6.9 0 8 0C9.1 0 10.042 0.392 10.825 1.175C11.608 1.958 12 2.9 12 4C12 5.1 11.608 6.042 10.825 6.825C10.042 7.608 9.1 8 8 8ZM0 16V13.2C0 12.633 0.146 12.113 0.438 11.638C0.729 11.163 1.117 10.8 1.6 10.55C2.633 10.033 3.683 9.646 4.75 9.388C5.817 9.129 6.9 9 8 9C9.1 9 10.183 9.129 11.25 9.388C12.317 9.646 13.367 10.033 14.4 10.55C14.883 10.8 15.271 11.163 15.563 11.638C15.854 12.113 16 12.633 16 13.2V16H0Z" fill="#594238"/>
          </svg>
        </div>
        <span class="user-label">Kasir</span>
      </div>
      <button onclick="document.getElementById('logoutModal').classList.remove('hidden')" class="nav-item" style="width:100%;text-align:left;background:none;border:none;cursor:pointer;">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
          <path d="M2 18C1.45 18 0.979 17.804 0.588 17.413C0.196 17.021 0 16.55 0 16V2C0 1.45 0.196 0.979 0.588 0.588C0.979 0.196 1.45 0 2 0H9V2H2V16H9V18H2ZM13 14L11.625 12.55L14.175 10H6V8H14.175L11.625 5.45L13 4L18 9L13 14Z" fill="#D35400"/>
        </svg>
        <span>Keluar</span>
      </button>
    </div>
  </aside>

  <!-- ── MAIN ── -->
  <main class="main">

    <div class="topbar">
      <div class="search-wrap">
        <div class="search-icon">
          <svg width="16" height="16" viewBox="0 0 18 24" fill="none">
            <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.14583 12.3708 1.8875 11.1125C0.629167 9.85417 0 8.31667 0 6.5C0 4.68333 0.629167 3.14583 1.8875 1.8875C3.14583 0.629167 4.68333 0 6.5 0C8.31667 0 9.85417 0.629167 11.1125 1.8875C12.3708 3.14583 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.8125 10.5625 9.6875 9.6875C10.5625 8.8125 11 7.75 11 6.5C11 5.25 10.5625 4.1875 9.6875 3.3125C8.8125 2.4375 7.75 2 6.5 2C5.25 2 4.1875 2.4375 3.3125 3.3125C2.4375 4.1875 2 5.25 2 6.5C2 7.75 2.4375 8.8125 3.3125 9.6875C4.1875 10.5625 5.25 11 6.5 11Z" fill="#594238"/>
          </svg>
        </div>
        <input class="search-input" type="text" placeholder="Cari ..." id="searchMeja">
      </div>
      <div class="date-badge">
        <svg width="14" height="15" viewBox="0 0 14 15" fill="none">
          <path d="M1.5 15C1.088 15 0.734 14.853 0.441 14.559C0.147 14.266 0 13.913 0 13.5V3C0 2.588 0.147 2.234 0.441 1.941C0.734 1.647 1.088 1.5 1.5 1.5H2.25V0H3.75V1.5H9.75V0H11.25V1.5H12C12.413 1.5 12.766 1.647 13.059 1.941C13.353 2.234 13.5 2.588 13.5 3V13.5C13.5 13.913 13.353 14.266 13.059 14.559C12.766 14.853 12.413 15 12 15H1.5ZM1.5 13.5H12V6H1.5V13.5ZM1.5 4.5H12V3H1.5V4.5Z" fill="#D35400"/>
        </svg>
        <span id="currentDate"></span>
      </div>
    </div>

    <div class="content">

      <div>
        <h1 class="page-title">Status Meja</h1>
        <p class="page-sub">Kelola ketersediaan dan reservasi meja secara real-time.</p>
      </div>

      <!-- Stat Strip -->
      <div class="stat-strip" id="statStrip"></div>

      <!-- Table -->
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>ID Meja</th>
              <th>Nama Meja</th>
              <th>Zone</th>
              <th>Kapasitas</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="mejaTableBody"></tbody>
        </table>
      </div>

    </div>
  </main>

</div><!-- /app -->

<!-- ── LOGOUT MODAL ── -->
<div id="logoutModal" class="hidden" style="position:fixed;inset:0;background:rgba(0,0,0,0.35);display:flex;align-items:center;justify-content:center;z-index:100;padding:1rem;">
  <div style="background:#FFF8F5;border-radius:20px;padding:2rem 1.75rem;width:100%;max-width:340px;display:flex;flex-direction:column;align-items:center;gap:1rem;box-shadow:0 8px 32px rgba(0,0,0,0.12);">
    <div style="width:48px;height:48px;border-radius:50%;background:#F5E9E4;display:flex;align-items:center;justify-content:center;">
      <svg width="22" height="22" viewBox="0 0 18 18" fill="none"><path d="M2 18C1.45 18 0.979 17.804 0.588 17.413C0.196 17.021 0 16.55 0 16V2C0 1.45 0.196 0.979 0.588 0.588C0.979 0.196 1.45 0 2 0H9V2H2V16H9V18H2ZM13 14L11.625 12.55L14.175 10H6V8H14.175L11.625 5.45L13 4L18 9L13 14Z" fill="#1C1C1C"/></svg>
    </div>
    <p style="font-size:18px;font-weight:700;color:#1C1C1C;">Yakin ingin keluar?</p>
    <p style="font-size:13px;color:#8D7B72;margin-top:-8px;">Apa anda yakin ingin keluar</p>
    <div style="display:flex;gap:10px;width:100%;margin-top:4px;">
      <button onclick="document.getElementById('logoutModal').classList.add('hidden')" style="flex:1;padding:0.875rem;background:#F5DDD5;color:#4A3B32;border:none;border-radius:10px;font-family:inherit;font-size:14px;font-weight:600;cursor:pointer;">Batal</button>
      <form method="POST" action="{{ route('logout') }}" style="flex:1;">
        @csrf
        <button type="submit" style="width:100%;padding:0.875rem;background:#D35400;color:#fff;border:none;border-radius:10px;font-family:inherit;font-size:14px;font-weight:600;cursor:pointer;">Keluar</button>
      </form>
    </div>
  </div>
</div>

<script>
window.APP = {
  routeStatusMeja: '{{ url("/kasir/status-meja") }}'
};
</script>
@vite('resources/js/status-meja.js')
</body>
</html>
