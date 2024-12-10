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
    <link rel="stylesheet" href="ccss/riwayat.css">
</head>
<body>
<nav>
    <div class="tombol_kebali container-fluid mt-3"> 
            <a href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="60" viewBox="0 0 24 24"><path fill="#000000" d="m7.825 13l4.9 4.9q.3.3.288.7t-.313.7q-.3.275-.7.288t-.7-.288l-6.6-6.6q-.15-.15-.213-.325T4.426 12t.063-.375t.212-.325l6.6-6.6q.275-.275.688-.275t.712.275q.3.3.3.713t-.3.712L7.825 11H19q.425 0 .713.288T20 12t-.288.713T19 13z"/></svg></a>
    </div>
</nav>

<div class="container mt-4">
    <h3 class="text-center">Riwayat Transaksi</h3>

    <?php if ($result && $result->num_rows > 0): ?>
        <table class="table table-bordered table-striped mt-5">
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

    <div class="btnlagi">
        <button onclick="window.print()" class="btn btn-primary text-center">Cetak Riwayat Transaksi</button>
    </div>

<!-- footer Section -->
<section id="footer">
 <div class="container ">
    <div class="footer-content">
      <div class="footer-left">
        <p class="brand-name ds-5">AIVACARE</p>
        <p class="copyright fs-5">© 2024 AIVA - Platform Donasi. Semua hak dilindungi.</p>
      </div>
      <div class="footer-right">
        <p class="fs-5">Social Media</p>
        <div class="social-icons">
          <a href="#" class="social-icon instagram"><i class="fab fa-instagram"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"/></svg> </i></a>
          <a href="#" class="social-icon twitter"><i class="fab fa-x"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 251 256"><path d="M149.079 108.399L242.33 0h-22.098l-80.97 94.12L74.59 0H0l97.796 142.328L0 256h22.1l85.507-99.395L175.905 256h74.59L149.073 108.399zM118.81 143.58l-9.909-14.172l-78.84-112.773h33.943l63.625 91.011l9.909 14.173l82.705 118.3H186.3l-67.49-96.533z"/></svg></i></a>
          <a href="#" class="social-icon tiktok"><i class="fab fa-tiktok"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M19 10.56a6.57 6.57 0 0 1-3.838-1.229v5.588a5.082 5.082 0 1 1-4.38-5.035v2.81a2.33 2.33 0 1 0 1.63 2.225V4h2.75q-.002.35.06.694A3.82 3.82 0 0 0 16.906 7.2c.621.41 1.35.629 2.094.628z"/></svg></i></a>
        </div>
      </div>
    </div>
  </div>
 </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
