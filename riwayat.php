<?php
// Mengambil data transaksi dengan judul campaign
session_start();
include("connection/koneksi.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

$user_id = $_SESSION['user_id']; // Ambil user_id dari session

$sql = "
    SELECT transaksi.*, campaign.judul_donasi 
    FROM transaksi 
    JOIN campaign ON transaksi.campaign_id = campaign.id 
    WHERE transaksi.user_id = '$user_id' 
    ORDER BY transaksi.tanggal_transaksi DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center">Riwayat Transaksi</h3>

    <?php if ($result && $result->num_rows > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Campaign</th>
                    <th>Nominal</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['judul_donasi']); ?></td>
                        <td>Rp <?= number_format($row['jumlah_donasi'], 2, ',', '.'); ?></td>
                        <td><?= $row['metode_pembayaran']; ?></td>
                        <td><?= $row['tanggal_transaksi']; ?></td>
                        <td>
                            <a href="hapus_transaksi.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Tidak ada riwayat transaksi.</p>
    <?php endif; ?>
</div>

<center><button onclick="window.print()" class="btn btn-primary">Cetak Riwayat Transaksi</button>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
