<?php
include("connection/koneksi.php");

// Tangkap ID dari parameter URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data kampanye berdasarkan ID
$sql = "SELECT * FROM campaign WHERE id = $id";
$result = $conn->query($sql);

// Periksa apakah kampanye ditemukan
if ($result && $result->num_rows > 0) {
    $campaign = $result->fetch_assoc();
} else {
    die("Kampanye tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kampanye - <?= htmlspecialchars($campaign['judul_donasi']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center"><?= htmlspecialchars($campaign['judul_donasi']) ?></h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="<?= htmlspecialchars($campaign['gambar']) ?>" class="img-fluid" alt="<?= htmlspecialchars($campaign['judul_donasi']) ?>">
        </div>
        <div class="col-md-6">
            <h3>Deskripsi</h3>
            <p><?= nl2br(htmlspecialchars($campaign['deskripsi'])) ?></p>
            <h3>Donasi Terkumpul</h3>
            <p>
                Rp <?= number_format($campaign['jumlah_terkumpul'], 0, ',', '.') ?> / 
                Rp <?= number_format($campaign['jumlah_donasi'], 0, ',', '.') ?>
            </p>
            <h3>Donasi Sekarang</h3>
            <!-- Belum ada form pembayaran nya  -->
            <a href="form_donasi.php?id=<?= $campaign['id'] ?>" class="btn btn-success">Mulai Donasi</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>