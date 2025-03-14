<?php
// Periksa apakah form telah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form yang dikirimkan oleh pengguna
    $nama = $_POST['nama']; // Menyimpan nama pemesan
    $identitas = $_POST['identitas']; // Menyimpan nomor identitas pemesan
    $gender = $_POST['gender']; // Menyimpan jenis kelamin pemesan
    $car = $_POST['car']; // Menyimpan jenis mobil yang dipilih
    $durasi = $_POST['durasi']; // Menyimpan durasi sewa dalam hari
    $harga = str_replace('.', '', $_POST['harga']); // Menghapus format angka (titik) untuk menghitung harga
    $supir = isset($_POST['supir']); // Menyimpan status apakah pemesan memilih supir atau tidak

    // Konversi nilai durasi dan harga ke tipe numerik (integer) untuk perhitungan
    $durasi = (int) $durasi;
    $harga = (int) $harga;

    // Menghitung total harga sewa mobil berdasarkan harga per hari dan durasi sewa
    $total_harga_mobil = $harga * $durasi;

    // Menghitung diskon jika durasi sewa >= 3 hari (diskon 10%)
    $diskon = ($durasi >= 3) ? 0.1 * $total_harga_mobil : 0;

    // Menghitung biaya supir jika dipilih (Rp 100.000 per hari)
    $biaya_supir = $supir ? (100000 * $durasi) : 0;

    // Total pembayaran akhir setelah diskon dan biaya supir
    $totalBayar = ($total_harga_mobil - $diskon) + $biaya_supir;
} else {
    // Jika halaman diakses langsung tanpa form, redirect ke halaman utama
    header("Location: index.php");
    exit(); // Menghentikan eksekusi lebih lanjut setelah redirect
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Menentukan charset dan viewport untuk tampilan responsif -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pemesanan</title>
    <!-- Menyertakan Bootstrap untuk desain responsif -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Container untuk menampilkan detail pemesanan -->
    <div class="container mt-5">
        <!-- Kartu untuk menampilkan detail pemesanan -->
        <div class="card">
            <!-- Header kartu dengan background hijau dan teks putih -->
            <div class="card-header bg-success text-white text-center">
                <h5>Detail Pemesanan</h5>
            </div>
            <div class="card-body">
                <!-- Menampilkan detail pemesanan dalam bentuk paragraf -->
                <p><strong>Nama Pemesan:</strong> <?= $nama ?></p> <!-- Nama pemesan -->
                <p><strong>Nomor Identitas:</strong> <?= $identitas ?></p> <!-- Nomor identitas pemesan -->
                <p><strong>Jenis Kelamin:</strong> <?= $gender ?></p> <!-- Jenis kelamin pemesan -->
                <p><strong>Mobil yang Dipilih:</strong> <?= $car ?></p> <!-- Mobil yang dipilih -->
                <p><strong>Supir:</strong> <?= $supir ? 'Ya' : 'Tidak' ?></p> <!-- Apakah memilih supir -->
                <p><strong>Durasi Sewa:</strong> <?= $durasi ?> Hari</p> <!-- Durasi sewa dalam hari -->
                <p><strong>Diskon:</strong> <?= ($diskon > 0) ? '10%' : '0%' ?></p> <!-- Menampilkan diskon jika berlaku -->
                <!-- Menampilkan total harga yang harus dibayar setelah diskon dan biaya supir -->
                <p><strong>Total Bayar:</strong> Rp <?= number_format($totalBayar, 0, ',', '.') ?></p>

                <!-- Tombol untuk kembali ke halaman utama -->
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
