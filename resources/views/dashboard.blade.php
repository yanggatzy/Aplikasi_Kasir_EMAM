<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Emam - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-custom { border-radius: 15px; border: none; transition: 0.3s; }
        .card-custom:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <span class="navbar-brand mb-0 h1">🍲 RESTORAN EMAM</span>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card card-custom bg-primary text-white shadow-sm p-4">
                    <h5>Total Varian Menu</h5>
                    <h1 class="display-4 fw-bold">{{ $totalMenu }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom bg-success text-white shadow-sm p-4">
                    <h5>Total Nilai Harga Menu</h5>
                    <h1 class="display-4 fw-bold">Rp {{ number_format($totalHargaMenu, 0, ',', '.') }}</h1>
                </div>
            </div>
        </div>

        <div class="card card-custom shadow-sm overflow-hidden">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">Daftar Menu Saat Ini</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Makanan/Minuman</th>
                            <th>Harga Satuan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $menu->name }}</td>
                            <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-success">Tersedia</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <p class="text-muted text-center mt-4">© 2026 Aplikasi Emam - Dibuat oleh Student Telkom University</p>
    </div>
</body>
</html>
