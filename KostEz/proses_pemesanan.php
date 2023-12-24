<!DOCTYPE html>
<html>
<head>
    <title>Proses Pemesanan Hotel</title>
</head>
<body>
    <?php
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kamar = $_POST['kamar'];
    $fasilitas = $_POST['fasilitas'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Proses pemesanan (contoh: hanya menampilkan pesan konfirmasi)
    echo "<h1>Pemesanan Hotel</h1>";
    echo "<p>Pemesanan atas nama: $nama</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Kamar yang dipilih: $kamar</p>";
    echo "<p>Detail Fasilitas: $fasilitas</p>";
    echo "<p>Metode Pembayaran: $metode_pembayaran</p>";
    ?>
</body>
</html>
