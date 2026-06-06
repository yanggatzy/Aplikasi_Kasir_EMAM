<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu - Emam Resto</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  @vite('resources/css/menu-publik.css')
</head>
<body>
<script>
window.APP = { imgFallback: '{{ asset("images/mieayam.png") }}' };
</script>

<div class="page-wrap">

  <!-- ══ MAIN ══ -->
  <div class="main">

    <!-- HEADER -->
    <header class="header">
      <div class="header-logo">RestoMenu</div>
      <div class="header-dot"></div>
      <div class="header-tagline">Lihat menu kami &amp; pesan ke kasir</div>
    </header>

    <!-- CATEGORY TABS -->
    <div class="tabs-bar" id="tabsBar">
      <!-- diisi oleh JS -->
      <div class="skeleton" style="width:90px;height:30px;border-radius:20px;"></div>
      <div class="skeleton" style="width:110px;height:30px;border-radius:20px;"></div>
      <div class="skeleton" style="width:100px;height:30px;border-radius:20px;"></div>
      <div class="skeleton" style="width:80px;height:30px;border-radius:20px;"></div>
    </div>

    <!-- MENU GRID -->
    <div class="menu-scroll">
      <div class="menu-grid" id="menuGrid">
        <!-- diisi oleh JS -->
      </div>
    </div>

  </div><!-- /main -->

  <!-- ══ SIDEBAR ══ -->
  <aside class="sidebar">

    <div class="sidebar-header">
      <div class="sidebar-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
          <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="white"/>
        </svg>
      </div>
      <div>
        <div class="sidebar-title">Menu Terlaris</div>
        <div class="sidebar-sub">Favorit Pelanggan</div>
      </div>
    </div>

    <div class="sidebar-list" id="terlarisList">
      <!-- skeleton -->
      @for($i = 0; $i < 5; $i++)
      <div class="terlaris-item">
        <div class="terlaris-img-wrap skeleton"></div>
        <div class="terlaris-info">
          <div class="skeleton" style="height:13px;width:85%;margin-bottom:6px;border-radius:4px;"></div>
          <div class="skeleton" style="height:12px;width:55%;border-radius:4px;"></div>
        </div>
      </div>
      @endfor
    </div>

    <div class="clock">
      <div class="clock-time" id="clockTime">--:--</div>
      <div class="clock-date" id="clockDate">Memuat...</div>
    </div>

  </aside>

</div><!-- /page-wrap -->

@vite('resources/js/menu-publik.js')
</body>
</html>
