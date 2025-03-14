<?php
// Menyimpan data mobil sewaan dalam array multidimensi.
// Setiap mobil terdiri dari nama, harga, dan gambar mobil.
$rentals = [
    ["Fortuner",2000000, "fortunerrr.jpg"], // Data untuk mobil Fortuner
    ["Creta", 3000000, "cretaaa.jpg"], // Data untuk mobil Creta
    ["CRV", 1500000, "crvvv.jpg"] // Data untuk mobil CRV
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Mendeklarasikan karakter set dan viewport untuk responsif -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Kami</title>
    <!-- Menyertakan CSS Bootstrap untuk tampilan responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menentukan gaya untuk kartu produk */
        .product-card {
            text-align: center; /* Menengahkan teks dalam kartu produk */
        }
        .product-card img {
            width: 100%; /* Gambar mengambil lebar penuh */
            height: 200px; /* Mengatur tinggi gambar */
            object-fit: cover; /* Menjaga aspek rasio gambar */
            border-radius: 10px; /* Menambahkan sudut melengkung pada gambar */
        }
        .carousel-item img {
            height: 450px; /* Menentukan tinggi gambar carousel */
            object-fit: cover; /* Menjaga aspek rasio gambar */
        }
        .video-container {
            text-align: center;
            margin-top: 40px;
        }
        .product-video {
            width: 100%;
            max-height: 500px; /* Membatasi tinggi video */
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navbar untuk navigasi, dengan beberapa menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Tautan ke halaman utama -->
            <a class="navbar-brand" href="#">Rental Kami</a>
            <!-- Tombol untuk navbar responsif -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Menu untuk navigasi ke produk dan tentang kami -->
                    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Kamar (Carousel) untuk menampilkan gambar mobil -->
    <div id="bannerKamar" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <!-- Mengulang array $rentals untuk menampilkan indikator slide -->
            <?php foreach ($rentals as $indexarray => $nilai) { ?>
                <!-- Menentukan tombol indikator untuk setiap gambar di carousel -->
                <button type="button" data-bs-target="#bannerKamar" data-bs-slide-to="<?= $indexarray ?>" class="<?= $indexarray === 0 ? 'active' : '' ?>" aria-label="Slide <?= $indexarray + 1 ?>"></button>
            <?php } ?>
        </div>
        <div class="carousel-inner">
            <!-- Mengulang array $rentals untuk menampilkan setiap gambar dan deskripsi mobil -->
            <?php foreach ($rentals as $indexarray => $nilai) { ?>
                <div class="carousel-item <?= $indexarray === 0 ? 'active' : '' ?>">
                    <!-- Menampilkan gambar mobil sesuai dengan data yang ada -->
                    <img src="img/<?= $nilai[2] ?>" class="d-block w-100" alt="<?= $nilai[0] ?>">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                        <!-- Menampilkan nama mobil dan harga dalam carousel -->
                        <h3><?= $nilai[0] ?></h3>
                        <p>Harga mulai dari Rp <?= $nilai[1] ?> per malam.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Tombol navigasi untuk berpindah antar gambar di carousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerKamar" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerKamar" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Bagian produk (mobil) yang tersedia untuk disewa -->
    <div class="container mt-5">
        <section id="produk">
            <h2 class="text-center">Jenis Mobil</h2>
            <div class="row">
                <!-- Mengulang array $rentals untuk menampilkan setiap mobil dalam format kartu -->
                <?php foreach ($rentals as $indexarray => $nilai) { ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <!-- Gambar mobil -->
                        <img src="img/<?= $nilai[2] ?>" alt="<?= $nilai[0] ?>">
                        <h5 class="mt-2"><?= $nilai[0] ?></h5>
                        <!-- Menampilkan harga mobil dengan format angka -->
                        <h5 class="mt-2">Rp <?= number_format($nilai[1], 0, ',', '.') ?></h5>
                        <!-- Tombol untuk memesan mobil, dengan link yang mengarah ke halaman pemesanan -->
                        <a href="pesan.php?indexarray=<?= $indexarray ?>" class="btn btn-primary mt-2">Pesan</a>                    
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>

    <!-- Bagian tentang kami -->
    <div class="container mt-5">
        <section id="tentang">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h2 class="card-title">Tentang Kami</h2>
                    <p class="card-text">Selamat datang di <strong>Rental Kami</strong>, penyedia layanan rental terpercaya yang siap memenuhi kebutuhan transportasi Anda.</p>
                    <p class="card-text">Kami berlokasi di <strong>Jalan Flamboyan III</strong>, dengan berbagai pilihan kendaraan yang nyaman, terawat, dan siap digunakan untuk perjalanan bisnis, wisata, atau keperluan pribadi.</p>
                    <p class="card-text">Kami selalu mengutamakan kepuasan pelanggan dengan menyediakan layanan profesional, harga kompetitif, serta kemudahan dalam proses penyewaan.</p>
                    <hr>
                    <h5>Hubungi Kami</h5>
                    <p><strong>📍 Alamat:</strong>Jalan Flamboyan III</p>
                    <p><strong>📞 Telepon:</strong> <a href="tel:[+62895383875089]">+62895383875089</a></p>
                    <p><strong>📧 Email:</strong> <a href="mailto:[rentalkami@gmail.com]">rentalkami@gmail.com</a></p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer halaman -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Rental.</p>
    </footer>

    <!-- Menyertakan JS Bootstrap untuk fungsionalitas halaman -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
