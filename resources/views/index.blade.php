<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Penjualan Mobil - Toyota</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold">
            <i class="bi bi-car-front-fill"></i> CIBADUYUT TOYOTA
        </a>

        <div class="d-flex align-items-center">

            <button id="themeToggle" class="btn btn-light me-3">
                🌙 Dark Mode
            </button>

            <button class="btn btn-warning position-relative"
                    data-bs-toggle="modal"
                    data-bs-target="#wishlistModal">
                Wishlist
                <span id="wishlistBadge"
                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                </span>
            </button>

            <a href="{{ route('logout') }}" class="btn btn-light ms-3">
                Logout
            </a>
        </div>
    </div>
</nav>

<!-- ================= HERO ================= -->
<div class="hero-section d-flex align-items-center">
    <div class="container text-white text-center">
        <h1 class="display-4 fw-bold">Sistem Manajemen Penjualan Mobil Toyota</h1>
        <p class="lead">Kelola stok dan transaksi dengan mudah.</p>
    </div>
</div>

<!-- ================= DASHBOARD ================= -->
<div class="container mt-5">
    <div class="row text-center g-4">

        <div class="col-md-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <i class="bi bi-car-front-fill icon-dashboard"></i>
                    <h5>Total Mobil</h5>
                    <h2>3</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <i class="bi bi-check-circle-fill icon-dashboard"></i>
                    <h5>Mobil Terjual</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <i class="bi bi-box-seam-fill icon-dashboard"></i>
                    <h5>Stok Tersedia</h5>
                    <h2>15</h2>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ================= DAFTAR MOBIL ================= -->
<div class="container mt-5">
    <h2 class="section-title text-center mb-4">Daftar Mobil Toyota</h2>
    <div class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-4">
            <div class="card mobil-card">
                <img src="{{ asset('assets/avanza.jpg') }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">Toyota Avanza</h5>
                    <p>Rp 250.000.000</p>
                    <span class="badge bg-danger stok-badge" data-stok="5">Stok: 5</span>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-primary btn-beli w-50 me-2">Beli</button>
                        <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4">
            <div class="card mobil-card">
                <img src="{{ asset('assets/innova.png') }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">Toyota Innova</h5>
                    <p>Rp 350.000.000</p>
                    <span class="badge bg-danger stok-badge" data-stok="4">Stok: 4</span>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-primary btn-beli w-50 me-2">Beli</button>
                        <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-4">
            <div class="card mobil-card">
                <img src="{{ asset('assets/rush.jpg') }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">Toyota Rush</h5>
                    <p>Rp 280.000.000</p>
                    <span class="badge bg-danger stok-badge" data-stok="6">Stok: 6</span>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-primary btn-beli w-50 me-2">Beli</button>
                        <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ================= FORM TAMBAH MOBIL ================= -->
<div class="container mt-5">
    <h2 class="section-title text-center mb-4">Tambah Data Mobil</h2>

    <form id="formMobil" class="p-4 border rounded bg-light">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Mobil</label>
                <input type="text" id="namaMobil" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Harga</label>
                <input type="number" id="hargaMobil" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Stok</label>
                <input type="number" id="stokMobil" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Gambar (nama file saja)</label>
                <input type="text" id="gambarMobil" class="form-control" placeholder="contoh: avanza.jpg" required>
            </div>
        </div>

        <button type="submit" class="btn btn-danger w-100">Tambah Mobil</button>
    </form>
</div>

<!-- ================= MODAL WISHLIST ================= -->
<div class="modal fade" id="wishlistModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Daftar Wishlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul id="wishlistList" class="list-group"></ul>
            </div>
        </div>
    </div>
</div>

<footer class="footer-custom text-center py-3 mt-5">
    <p>&copy; 2026 Sistem Manajemen Penjualan Mobil Toyota</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>