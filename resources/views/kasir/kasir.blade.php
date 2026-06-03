<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasir - Emam Kasir</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/kasir.css')
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
      <a href="{{ url('/kasir') }}" class="nav-item active">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M5 6C4.45 6 3.979 5.804 3.588 5.413C3.196 5.021 3 4.55 3 4V2C3 1.45 3.196 0.979 3.588 0.588C3.979 0.196 4.45 0 5 0H15C15.55 0 16.021 0.196 16.413 0.588C16.804 0.979 17 1.45 17 2V4C17 4.55 16.804 5.021 16.413 5.413C16.021 5.804 15.55 6 15 6H5ZM5 4H15V2H5V4ZM2 20C1.45 20 0.979 19.804 0.588 19.413C0.196 19.021 0 18.55 0 18V17H20V18C20 18.55 19.804 19.021 19.413 19.413C19.021 19.804 18.55 20 18 20H2ZM0 16L3.475 8.175C3.642 7.808 3.892 7.521 4.225 7.313C4.558 7.104 4.917 7 5.3 7H14.7C15.083 7 15.442 7.104 15.775 7.313C16.108 7.521 16.358 7.808 16.525 8.175L20 16H0Z" fill="#B5451B"/>
        </svg>
        <span>Kasir</span>
      </a>
      <a href="{{ url('/kasir/status-meja') }}" class="nav-item">
        <svg width="20" height="16" viewBox="0 0 20 16" fill="none">
          <path d="M2.313 5H17.663L16.813 2H3.188L2.313 5ZM14.788 7H5.213L4.938 9H15.038L14.788 7ZM1.988 16L3.213 7H0.988C0.655 7 0.392 6.867 0.2 6.6C0.009 6.333 -0.045 6.042 0.038 5.725L1.463 0.725C1.53 0.508 1.646 0.333 1.813 0.2C1.98 0.067 2.18 0 2.413 0H17.563C17.796 0 17.996 0.067 18.163 0.2C18.33 0.333 18.446 0.508 18.513 0.725L19.938 5.725C20.021 6.042 19.967 6.333 19.775 6.6C19.584 6.867 19.321 7 18.988 7H16.788L17.988 16H15.988L15.313 11H4.663L3.988 16H1.988Z" fill="#594238"/>
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
          <path d="M2 18C1.45 18 0.979 17.804 0.588 17.413C0.196 17.021 0 16.55 0 16V2C0 1.45 0.196 0.979 0.588 0.588C0.979 0.196 1.45 0 2 0H9V2H2V16H9V18H2ZM13 14L11.625 12.55L14.175 10H6V8H14.175L11.625 5.45L13 4L18 9L13 14Z" fill="#B5451B"/>
        </svg>
        <span>Keluar</span>
      </button>
    </div>
  </aside>

  {{-- ── MODALS ── --}}

  {{-- Logout Confirm --}}
  <div id="logoutModal" class="hidden" style="position:fixed;inset:0;background:rgba(0,0,0,0.35);display:flex;align-items:center;justify-content:center;z-index:200;padding:1rem;">
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

  {{-- Hapus Keranjang Confirm --}}
  <div id="deleteModal" class="hidden" style="position:fixed;inset:0;background:rgba(0,0,0,0.35);display:flex;align-items:center;justify-content:center;z-index:200;padding:1rem;">
    <div style="background:#fff;border-radius:20px;padding:2rem 1.75rem;width:100%;max-width:300px;display:flex;flex-direction:column;align-items:center;gap:1.25rem;box-shadow:0 8px 32px rgba(0,0,0,0.12);">
      <p style="font-size:20px;font-weight:600;color:#1C1C1C;text-align:center;">Hapus Dari Keranjang?</p>
      <button id="deleteConfirmBtn" style="width:100%;padding:1rem;background:#D35400;color:#fff;border:none;border-radius:9999px;font-family:inherit;font-size:14px;font-weight:600;cursor:pointer;letter-spacing:0.3px;">Hapus</button>
      <button onclick="document.getElementById('deleteModal').classList.add('hidden')" style="width:100%;padding:0.875rem;background:#EEE3DC;color:#4A3B32;border:none;border-radius:9999px;font-family:inherit;font-size:14px;font-weight:500;cursor:pointer;">Batal</button>
    </div>
  </div>

  {{-- Payment Modal --}}
  <div id="payModal" class="hidden" style="position:fixed;inset:0;background:rgba(0,0,0,0.35);display:flex;align-items:center;justify-content:center;z-index:200;padding:1rem;">
    <div style="background:#fff;border-radius:16px;width:100%;max-width:470px;display:flex;flex-direction:column;box-shadow:0 8px 32px rgba(0,0,0,0.12);max-height:90vh;overflow-y:auto;scrollbar-width:none;" class="pay-modal-inner">
      {{-- Header --}}
      <div style="display:flex;align-items:center;justify-content:space-between;padding:1.25rem 1.5rem;border-bottom:1px solid #EAE1DC;">
        <span style="font-size:20px;font-weight:700;color:#1C1C1C;">Pembayaran</span>
        <button onclick="document.getElementById('payModal').classList.add('hidden')" style="background:none;border:none;cursor:pointer;font-size:20px;color:#594238;line-height:1;">✕</button>
      </div>
      {{-- Body --}}
      <div style="padding:1.25rem 1.5rem;display:flex;flex-direction:column;gap:1.25rem;">
        {{-- Total --}}
        <div style="background:#FFF5F0;border-radius:10px;padding:1rem 1.25rem;">
          <div style="font-size:11px;font-weight:700;letter-spacing:0.6px;color:#8D7B72;text-transform:uppercase;margin-bottom:4px;">Total Tagihan</div>
          <div id="payModalTotal" style="font-size:22px;font-weight:700;color:#D35400;">Rp 0</div>
        </div>
        {{-- Metode --}}
        <div>
          <div style="font-size:14px;font-weight:500;color:#1C1C1C;margin-bottom:10px;">Metode Pembayaran</div>
          <div style="display:flex;gap:10px;">
            <button class="pay-method-btn active-method" data-method="tunai" style="flex:1;padding:14px 8px;border:1.5px solid #EAE1DC;border-radius:10px;background:#fff;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:6px;font-family:inherit;font-size:13px;font-weight:600;color:#594238;transition:all 0.15s;">
              <svg width="20" height="18" viewBox="0 0 20 18" fill="none"><path d="M10 11C8.9 11 7.95833 10.6083 7.175 9.825C6.39167 9.04167 6 8.1 6 7C6 5.9 6.39167 4.95833 7.175 4.175C7.95833 3.39167 8.9 3 10 3C11.1 3 12.0417 3.39167 12.825 4.175C13.6083 4.95833 14 5.9 14 7C14 8.1 13.6083 9.04167 12.825 9.825C12.0417 10.6083 11.1 11 10 11ZM2 14C1.45 14 0.979167 13.8042 0.5875 13.4125C0.195833 13.0208 0 12.55 0 12V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H18C18.55 0 19.0208 0.195833 19.4125 0.5875C19.8042 0.979167 20 1.45 20 2V12C20 12.55 19.8042 13.0208 19.4125 13.4125C19.0208 13.8042 18.55 14 18 14H2ZM4 12H16C16 11.45 16.1958 10.9792 16.5875 10.5875C16.9792 10.1958 17.45 10 18 10V4C17.45 4 16.9792 3.80417 16.5875 3.4125C16.1958 3.02083 16 2.55 16 2H4C4 2.55 3.80417 3.02083 3.4125 3.4125C3.02083 3.80417 2.55 4 2 4V10C2.55 10 3.02083 10.1958 3.4125 10.5875C3.80417 10.9792 4 11.45 4 12ZM1 18C0.716667 18 0.479167 17.9042 0.2875 17.7125C0.0958333 17.5208 0 17.2833 0 17C0 16.7167 0.0958333 16.4792 0.2875 16.2875C0.479167 16.0958 0.716667 16 1 16H19C19.2833 16 19.5208 16.0958 19.7125 16.2875C19.9042 16.4792 20 16.7167 20 17C20 17.2833 19.9042 17.5208 19.7125 17.7125C19.5208 17.9042 19.2833 18 19 18H1Z" fill="currentColor"/></svg>
              Tunai
            </button>
            <button class="pay-method-btn" data-method="qris" style="flex:1;padding:14px 8px;border:1.5px solid #EAE1DC;border-radius:10px;background:#fff;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:6px;font-family:inherit;font-size:13px;font-weight:600;color:#594238;transition:all 0.15s;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M3 3H9V9H3V3ZM5 5V7H7V5H5ZM15 3H21V9H15V3ZM17 5V7H19V5H17ZM3 15H9V21H3V15ZM5 17V19H7V17H5ZM15 15H17V17H15V15ZM17 17H19V15H21V17H19V19H21V21H19V19H17V21H15V19H17V17ZM11 3H13V5H11V3ZM3 11H5V13H3V11ZM5 11H7V9H9V11H7V13H5V11ZM9 11H11V13H9V11ZM11 11H13V9H15V11H13V13H11V11ZM13 13H15V15H13V13Z" fill="currentColor"/></svg>
              QRIS
            </button>
            <button class="pay-method-btn" data-method="transfer" style="flex:1;padding:14px 8px;border:1.5px solid #EAE1DC;border-radius:10px;background:#fff;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:6px;font-family:inherit;font-size:13px;font-weight:600;color:#594238;transition:all 0.15s;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z" fill="currentColor"/></svg>
              Transfer
            </button>
          </div>
        </div>
        {{-- Method Content --}}
        <div id="methodTunai" style="display:flex;flex-direction:column;gap:12px;">
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Total Bayar</label>
            <div style="padding:12px 14px;border:1.5px solid #D35400;border-radius:8px;font-size:14px;font-weight:500;color:#4A3B32;" id="tunaiAmtDisplay">Rp 0</div>
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Nama Pelanggan</label>
            <input type="text" placeholder="Masukkan nama pelanggan" style="width:100%;padding:12px 14px;border:1.5px solid #EAE1DC;border-radius:8px;font-family:inherit;font-size:14px;color:#4A3B32;outline:none;" onfocus="this.style.borderColor='#D35400'" onblur="this.style.borderColor='#EAE1DC'">
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Pilih Meja</label>
            <select id="mejaSelect" style="width:100%;padding:12px 14px;border:1.5px solid #D35400;border-radius:8px;font-family:inherit;font-size:14px;color:#4A3B32;background:#fff;outline:none;">
              @for($i = 1; $i <= 28; $i++)
                <option value="T-{{ str_pad($i,2,'0',STR_PAD_LEFT) }}">Meja {{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>
              @endfor
            </select>
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:8px;">Set Status Meja</label>
            <div style="display:flex;gap:10px;">
              <button id="btnReservasi" onclick="pilihStatusMeja('dipesan',this)" style="flex:1;padding:10px 8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;transition:all 0.15s;">
                🔵 Reservasi
              </button>
              <button id="btnIsi" onclick="pilihStatusMeja('terisi',this)" style="flex:1;padding:10px 8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;transition:all 0.15s;">
                🔴 Isi
              </button>
            </div>
            <div id="mejaStatusInfo" style="display:none;margin-top:6px;padding:7px 12px;background:#D1FAE5;border-radius:6px;font-size:12px;font-weight:600;color:#065F46;"></div>
          </div>
        </div>
        <div id="methodQris" style="display:none;flex-direction:column;gap:12px;">
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Nama Pelanggan</label>
            <input id="qrisNama" type="text" placeholder="Masukkan nama pelanggan" style="width:100%;padding:12px 14px;border:1.5px solid #EAE1DC;border-radius:8px;font-family:inherit;font-size:14px;color:#4A3B32;outline:none;" onfocus="this.style.borderColor='#D35400'" onblur="this.style.borderColor='#EAE1DC'">
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Pilih Meja</label>
            <select id="qrisMeja" style="width:100%;padding:12px 14px;border:1.5px solid #D35400;border-radius:8px;font-family:inherit;font-size:14px;color:#4A3B32;background:#fff;outline:none;">
              @for($i = 1; $i <= 28; $i++)
                <option value="T-{{ str_pad($i,2,'0',STR_PAD_LEFT) }}">Meja {{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>
              @endfor
            </select>
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:8px;">Set Status Meja</label>
            <div style="display:flex;gap:10px;">
              <button id="qrisBtnReservasi" onclick="pilihStatusMeja('dipesan',this,'qris')" style="flex:1;padding:10px 8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;transition:all 0.15s;">🔵 Reservasi</button>
              <button id="qrisBtnIsi" onclick="pilihStatusMeja('terisi',this,'qris')" style="flex:1;padding:10px 8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;transition:all 0.15s;">🔴 Isi</button>
            </div>
            <div id="qrisMejaInfo" style="display:none;margin-top:6px;padding:7px 12px;background:#D1FAE5;border-radius:6px;font-size:12px;font-weight:600;color:#065F46;"></div>
          </div>
          <div style="background:#FFF5F0;border-radius:12px;padding:1.25rem;display:flex;flex-direction:column;align-items:center;gap:12px;width:100%;">
            <div style="background:#1a2e44;border-radius:8px;padding:12px;">
              <svg width="100" height="100" viewBox="0 0 100 100" fill="none">
                <rect x="0" y="0" width="40" height="40" rx="4" fill="white"/>
                <rect x="5" y="5" width="30" height="30" rx="2" fill="#D35400"/>
                <rect x="10" y="10" width="20" height="20" rx="1" fill="white"/>
                <rect x="60" y="0" width="40" height="40" rx="4" fill="white"/>
                <rect x="65" y="5" width="30" height="30" rx="2" fill="#D35400"/>
                <rect x="70" y="10" width="20" height="20" rx="1" fill="white"/>
                <rect x="0" y="60" width="40" height="40" rx="4" fill="white"/>
                <rect x="5" y="65" width="30" height="30" rx="2" fill="#D35400"/>
                <rect x="10" y="70" width="20" height="20" rx="1" fill="white"/>
                <rect x="45" y="45" width="10" height="10" fill="white"/>
                <rect x="55" y="45" width="5" height="5" fill="white"/>
                <rect x="60" y="50" width="10" height="5" fill="white"/>
                <rect x="50" y="55" width="5" height="10" fill="white"/>
                <rect x="60" y="60" width="10" height="10" fill="white"/>
                <rect x="75" y="55" width="10" height="10" fill="white"/>
                <rect x="85" y="65" width="10" height="10" fill="white"/>
                <rect x="75" y="75" width="5" height="10" fill="white"/>
                <rect x="45" y="65" width="5" height="5" fill="white"/>
                <rect x="45" y="75" width="5" height="15" fill="white"/>
              </svg>
            </div>
            <p style="font-size:13px;color:#594238;text-align:center;">Scan QR di atas untuk menyelesaikan pembayaran</p>
            <p style="font-size:13px;font-weight:600;color:#594238;">Subtotal: <span id="qrisSubtotal" style="color:#D35400;">Rp 0</span></p>
          </div>
        </div>
        <div id="methodTransfer" style="display:none;flex-direction:column;gap:12px;">
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Nama Pelanggan</label>
            <input id="tfNama" type="text" placeholder="Masukkan nama pelanggan" style="width:100%;padding:12px 14px;border:1.5px solid #EAE1DC;border-radius:8px;font-family:inherit;font-size:14px;color:#4A3B32;outline:none;" onfocus="this.style.borderColor='#D35400'" onblur="this.style.borderColor='#EAE1DC'">
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:6px;">Pilih Meja</label>
            <select id="tfMeja" style="width:100%;padding:12px 14px;border:1.5px solid #D35400;border-radius:8px;font-family:inherit;font-size:14px;color:#4A3B32;background:#fff;outline:none;">
              @for($i = 1; $i <= 28; $i++)
                <option value="T-{{ str_pad($i,2,'0',STR_PAD_LEFT) }}">Meja {{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>
              @endfor
            </select>
          </div>
          <div>
            <label style="font-size:13px;font-weight:500;color:#1C1C1C;display:block;margin-bottom:8px;">Set Status Meja</label>
            <div style="display:flex;gap:10px;">
              <button id="tfBtnReservasi" onclick="pilihStatusMeja('dipesan',this,'tf')" style="flex:1;padding:10px 8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;transition:all 0.15s;">🔵 Reservasi</button>
              <button id="tfBtnIsi" onclick="pilihStatusMeja('terisi',this,'tf')" style="flex:1;padding:10px 8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;transition:all 0.15s;">🔴 Isi</button>
            </div>
            <div id="tfMejaInfo" style="display:none;margin-top:6px;padding:7px 12px;background:#D1FAE5;border-radius:6px;font-size:12px;font-weight:600;color:#065F46;"></div>
          </div>
          <div>
            <div style="font-size:13px;font-weight:500;color:#1C1C1C;margin-bottom:8px;">Pilih Bank</div>
            <div style="display:flex;gap:8px;">
              <button class="bank-btn active-bank" data-bank="BCA" style="flex:1;padding:8px;border:1.5px solid #D35400;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#D35400;cursor:pointer;">✔ BCA</button>
              <button class="bank-btn" data-bank="Mandiri" style="flex:1;padding:8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;">Mandiri</button>
              <button class="bank-btn" data-bank="BNI" style="flex:1;padding:8px;border:1.5px solid #EAE1DC;border-radius:8px;background:#fff;font-family:inherit;font-size:13px;font-weight:600;color:#594238;cursor:pointer;">BNI</button>
            </div>
          </div>
          <div style="background:#FFF5F0;border-radius:10px;padding:1rem;">
            <div style="font-size:11px;color:#8D7B72;font-weight:500;margin-bottom:4px;" id="vaLabel">Virtual Account BCA</div>
            <div style="display:flex;align-items:center;justify-content:space-between;gap:10px;">
              <span id="vaNumber" style="font-size:18px;font-weight:700;color:#1C1C1C;letter-spacing:1px;">8839 0812 3456 7890</span>
              <button onclick="navigator.clipboard.writeText(document.getElementById('vaNumber').textContent)" style="padding:6px 12px;background:#FFDBCD;border:none;border-radius:6px;font-family:inherit;font-size:12px;font-weight:600;color:#D35400;cursor:pointer;">⧉ Salin</button>
            </div>
          </div>
          <div style="background:#FFF5F0;border-radius:8px;padding:12px;font-size:12px;color:#594238;display:flex;gap:8px;align-items:flex-start;">
            <span style="flex-shrink:0;">ℹ</span>
            <span>Mohon transfer tepat sesuai nominal tagihan untuk verifikasi otomatis.</span>
          </div>
          <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:#594238;">
            <span style="width:8px;height:8px;border-radius:50%;background:#22C55E;flex-shrink:0;display:inline-block;"></span>
            Menunggu Pembayaran
          </div>
        </div>
      </div>
      {{-- Footer --}}
      <div style="padding:1rem 1.5rem;border-top:1px solid #EAE1DC;display:flex;gap:10px;">
        <button onclick="document.getElementById('payModal').classList.add('hidden')" style="flex:1;padding:14px;background:#F5E9E4;color:#4A3B32;border:none;border-radius:8px;font-family:inherit;font-size:13px;font-weight:700;letter-spacing:0.5px;cursor:pointer;text-transform:uppercase;">BATAL</button>
        <button id="payConfirmBtn" style="flex:2;padding:14px;background:#D35400;color:#fff;border:none;border-radius:8px;font-family:inherit;font-size:13px;font-weight:700;letter-spacing:0.5px;cursor:pointer;text-transform:uppercase;display:flex;align-items:center;justify-content:center;gap:8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" fill="white"/></svg>
          PROSES PEMBAYARAN
        </button>
      </div>
    </div>
  </div>

  {{-- ── STRUK MODAL ── --}}
  <div id="strutModal" class="hidden" style="position:fixed;inset:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;z-index:300;padding:1rem;">
    <div style="display:flex;flex-direction:column;align-items:center;gap:12px;width:100%;max-width:360px;">
      <div id="strutContent" style="background:#fff;border-radius:12px;width:100%;padding:0;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,0.15);font-family:'Courier New',monospace;font-size:13px;">
        <div style="background:#D35400;padding:20px;text-align:center;color:#fff;">
          <div style="font-size:22px;font-weight:700;letter-spacing:1px;">EMAM</div>
          <div style="font-size:12px;opacity:0.85;margin-top:2px;">Restoran</div>
        </div>
        <div style="padding:16px;border-bottom:1px dashed #ccc;">
          <div style="display:flex;justify-content:space-between;margin-bottom:4px;"><span style="color:#888;">Tanggal</span><span id="rTanggal" style="font-weight:600;"></span></div>
          <div style="display:flex;justify-content:space-between;margin-bottom:4px;"><span style="color:#888;">Kasir</span><span id="rKasir" style="font-weight:600;"></span></div>
          <div style="display:flex;justify-content:space-between;margin-bottom:4px;"><span style="color:#888;">Pelanggan</span><span id="rPelanggan" style="font-weight:600;"></span></div>
          <div style="display:flex;justify-content:space-between;margin-bottom:4px;"><span style="color:#888;">Meja</span><span id="rMeja" style="font-weight:600;"></span></div>
          <div style="display:flex;justify-content:space-between;"><span style="color:#888;">Metode</span><span id="rMetode" style="font-weight:600;"></span></div>
        </div>
        <div id="rItems" style="padding:16px;border-bottom:1px dashed #ccc;display:flex;flex-direction:column;gap:6px;"></div>
        <div style="padding:16px;border-bottom:1px dashed #ccc;">
          <div style="display:flex;justify-content:space-between;margin-bottom:4px;color:#888;"><span>Subtotal</span><span id="rSubtotal"></span></div>
          <div style="display:flex;justify-content:space-between;margin-bottom:4px;color:#888;"><span>Pajak (10%)</span><span id="rTax"></span></div>
          <div style="display:flex;justify-content:space-between;font-weight:700;font-size:15px;color:#D35400;margin-top:8px;"><span>TOTAL</span><span id="rTotal"></span></div>
        </div>
        <div style="padding:16px;text-align:center;color:#888;font-size:12px;">
          ★ Terima kasih telah berkunjung ★<br>Semoga hari Anda menyenangkan!
        </div>
      </div>
      <div class="no-print" style="display:flex;gap:10px;width:100%;">
        <button onclick="window.print()" style="flex:1;padding:13px;background:#D35400;color:#fff;border:none;border-radius:10px;font-family:inherit;font-size:14px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-11c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z" fill="white"/></svg>
          Cetak Struk
        </button>
        <button onclick="tutupStruk()" style="flex:1;padding:13px;background:#EEE3DC;color:#4A3B32;border:none;border-radius:10px;font-family:inherit;font-size:14px;font-weight:700;cursor:pointer;">Selesai</button>
      </div>
    </div>
  </div>

  <!-- ── MAIN ── -->
  <main class="main">

    <!-- Body Row (full height, order panel flush top) -->
    <div class="body-row">

      <!-- ── CATALOG ── -->
      <div class="catalog">

        <!-- Top Bar inside catalog -->
        <div class="topbar">
          <div class="search-wrap">
            <div class="search-icon">
              <svg width="16" height="16" viewBox="0 0 18 24" fill="none">
                <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.14583 12.3708 1.8875 11.1125C0.629167 9.85417 0 8.31667 0 6.5C0 4.68333 0.629167 3.14583 1.8875 1.8875C3.14583 0.629167 4.68333 0 6.5 0C8.31667 0 9.85417 0.629167 11.1125 1.8875C12.3708 3.14583 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.8125 10.5625 9.6875 9.6875C10.5625 8.8125 11 7.75 11 6.5C11 5.25 10.5625 4.1875 9.6875 3.3125C8.8125 2.4375 7.75 2 6.5 2C5.25 2 4.1875 2.4375 3.3125 3.3125C2.4375 4.1875 2 5.25 2 6.5C2 7.75 2.4375 8.8125 3.3125 9.6875C4.1875 10.5625 5.25 11 6.5 11Z" fill="#594238"/>
              </svg>
            </div>
            <input class="search-input" type="text" placeholder="Cari menu..." id="searchInput">
          </div>
          <div class="date-badge">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none">
              <path d="M1.5 15C1.088 15 0.734 14.853 0.441 14.559C0.147 14.266 0 13.913 0 13.5V3C0 2.588 0.147 2.234 0.441 1.941C0.734 1.647 1.088 1.5 1.5 1.5H2.25V0H3.75V1.5H9.75V0H11.25V1.5H12C12.413 1.5 12.766 1.647 13.059 1.941C13.353 2.234 13.5 2.588 13.5 3V13.5C13.5 13.913 13.353 14.266 13.059 14.559C12.766 14.853 12.413 15 12 15H1.5ZM1.5 13.5H12V6H1.5V13.5ZM1.5 4.5H12V3H1.5V4.5Z" fill="#B5451B"/>
            </svg>
            <span id="currentDate"></span>
          </div>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-bar">
          <button class="tab-btn active" data-cat="Semua Menu">Semua Menu</button>
          <button class="tab-btn" data-cat="Makanan Utama">Makanan Utama</button>
          <button class="tab-btn" data-cat="Minuman">Minuman</button>
          <button class="tab-btn" data-cat="Snacks">Snacks</button>
          <button class="tab-btn" data-cat="Dessert">Dessert</button>
        </div>

        <!-- Menu Grid -->
        <div class="menu-scroll">
          <div class="menu-grid" id="menuGrid"></div>
        </div>
      </div>

      <!-- ── ORDER PANEL ── -->
      <div class="order-panel">
        <div class="order-header">
          <span class="order-title">Pesanan Aktif</span>
          <span class="items-badge" id="itemsBadge">0 ITEMS</span>
        </div>

        <div class="order-type-row">
          <button class="type-btn active" id="dineInBtn">
            <span class="dot-green"></span>Dine-In
          </button>
          <button class="type-btn" id="takeAwayBtn">
            <span class="dot-green"></span>Take Away
          </button>
          <div class="server-info">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
              <path d="M8 8C6.9 8 5.958 7.608 5.175 6.825C4.392 6.042 4 5.1 4 4C4 2.9 4.392 1.958 5.175 1.175C5.958 0.392 6.9 0 8 0C9.1 0 10.042 0.392 10.825 1.175C11.608 1.958 12 2.9 12 4C12 5.1 11.608 6.042 10.825 6.825C10.042 7.608 9.1 8 8 8ZM0 16V13.2C0 12.633 0.146 12.113 0.438 11.638C0.729 11.163 1.117 10.8 1.6 10.55C2.633 10.033 3.683 9.646 4.75 9.388C5.817 9.129 6.9 9 8 9C9.1 9 10.183 9.129 11.25 9.388C12.317 9.646 13.367 10.033 14.4 10.55C14.883 10.8 15.271 11.163 15.563 11.638C15.854 12.113 16 12.633 16 13.2V16H0Z" fill="#594238"/>
            </svg>
            Server: {{ Auth::user()->username }}
          </div>
        </div>

        <div class="order-items" id="orderItems">
          <div class="order-empty" id="emptyState">
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
              <path d="M14 36C12.9 36 11.958 35.608 11.175 34.825C10.392 34.042 10 33.1 10 32V12H8V9H18V8H26V9H36V12H34V32C34 33.1 33.608 34.042 32.825 34.825C32.042 35.608 31.1 36 30 36H14ZM18 29H20V15H18V29ZM24 29H26V15H24V29Z" fill="currentColor"/>
            </svg>
            <p>Belum ada pesanan.<br>Pilih menu untuk mulai!</p>
          </div>
        </div>

        <div class="order-summary">
          <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotalVal">Rp 0</span>
          </div>
          <div class="summary-row">
            <span>Pajak (10%)</span>
            <span id="taxVal">Rp 0</span>
          </div>
          <div class="summary-total">
            <span class="summary-total-label">Total Akhir</span>
            <span class="summary-total-value" id="totalVal">Rp 0</span>
          </div>
          <button class="pay-btn" id="payBtn" disabled>
            <svg width="18" height="18" viewBox="0 0 18 20" fill="none">
              <path d="M3 20C2.167 20 1.458 19.708 0.875 19.125C0.292 18.542 0 17.833 0 17V14H3V0L4.5 1.5L6 0L7.5 1.5L9 0L10.5 1.5L12 0L13.5 1.5L15 0L16.5 1.5L18 0V17C18 17.833 17.708 18.542 17.125 19.125C16.542 19.708 15.833 20 15 20H3ZM6 7V5H12V7H6ZM6 10V8H12V10H6Z" fill="white"/>
            </svg>
            BAYAR SEKARANG
          </button>
        </div>
      </div>

    </div><!-- /body-row -->
  </main>
</div><!-- /app -->

<script>
window.APP = {
  imgMenu: '{{ asset("images/mieayam.png") }}',
  username: '{{ Auth::user()->username }}',
  routeStatusMeja: '{{ url("/kasir/status-meja") }}'
};
</script>
@vite('resources/js/kasir.js')
</body>
</html>

