<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

include("connection/koneksi.php");

// Cek apakah ada kategori yang dipilih
$kategori_filter = '';
if (isset($_GET['kategori']) && !empty($_GET['kategori'])) {
    $kategori_filter = $_GET['kategori'];
}

// Jalankan query untuk mengambil data kampanye berdasarkan kategori jika ada
$sql = "SELECT * FROM campaign";
if ($kategori_filter) {
    $sql .= " WHERE kategori = '$kategori_filter'";
}

$result = $conn->query($sql);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIVA - Platform Donasi</title>
    <!-- Memuat Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Memuat CSS lokal -->
    <link rel="stylesheet" href="ccss/style.css">
    <!-- Font dan Ikon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid d-flex">
            <!-- Logo -->
            <a class="navbar-brand me-auto" href="home_page_login.php">
                <img src="Asset/logo.png" alt="Aiva Care Logo" style="width: 60px;">
            </a>

            <!-- Navbar toggle button (for mobile view) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="home_page_login.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="home_page_login.php#About-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="home_page_login.php#documentation">Documentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="home_page_login.php#Menu">Menu</a></li>
                </ul>
            </div>

            <!-- Login button -->
            <div class="ms-auto">
                <a class="nav-link" href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M16 9a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-2 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0"/><path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1M3 12c0 2.09.713 4.014 1.908 5.542A8.99 8.99 0 0 1 12.065 14a8.98 8.98 0 0 1 7.092 3.458A9 9 0 1 0 3 12m9 9a8.96 8.96 0 0 1-5.672-2.012A6.99 6.99 0 0 1 12.065 16a6.99 6.99 0 0 1 5.689 2.92A8.96 8.96 0 0 1 12 21"/></g></svg></a>
            </div>
        </div>
    </nav>

<!-- Filter Kategori -->
<div class="container my-4 end">
    <form method="GET" action="">
        <div class="row">
            <div class="col-md-4">
                <select class="form-select" name="kategori" onchange="this.form.submit()">
                    <option value=""> Filter</option>
                    <option value="Pendidikan" <?= $kategori_filter == 'Pendidikan' ? 'selected' : '' ?>>Pendidikan</option>
                    <option value="Bantuan Sosial" <?= $kategori_filter == 'Bantuan Sosial' ? 'selected' : '' ?>>Bantuan Sosial</option>
                    <option value="Bencana Alam" <?= $kategori_filter == 'Bencana Alam' ? 'selected' : '' ?>>Bencana Alam</option>
                    <option value="Kesehatan" <?= $kategori_filter == 'Kesehatan' ? 'selected' : '' ?>>Kesehatan</option>
                    <option value="Lingkungan Hidup" <?= $kategori_filter == 'Lingkungan Hidup' ? 'selected' : '' ?>>Lingkungan Hidup</option>
                </select>
            </div>
        </div>
    </form>
</div>

<!-- Daftar Kampanye -->
<div class="container my-5">
    <h1 class="text-center mb-4">Daftar Kampanye Donasi</h1>
    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($campaign = $result->fetch_assoc()): ?>
                <?php 
                    $jumlah_terkumpul = $campaign['jumlah_terkumpul'];
                    $jumlah_donasi = $campaign['jumlah_donasi'];
                    $progress = ($jumlah_donasi > 0) ? min(100, ($jumlah_terkumpul / $jumlah_donasi) * 100) : 0; 
                    
                    // Cek apakah progress sudah mencapai 100%
                    if ($progress == 100) {
                        continue; // Lewatkan kampanye dengan progress 100%
                    }
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($campaign['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($campaign['judul_donasi']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($campaign['judul_donasi']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($campaign['deskripsi']) ?></p>
                            <p class="card-text">
                                <strong>Terkumpul:</strong> Rp <?= number_format($jumlah_terkumpul, 0, ',', '.') ?> / 
                                Rp <?= number_format($jumlah_donasi, 0, ',', '.') ?>
                            </p>
                            <!-- Progress Bar -->
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" 
                                     role="progressbar" 
                                     style="width: <?= $progress ?>%;" 
                                     aria-valuenow="<?= $progress ?>" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    <?= number_format($progress, 0) ?>%
                                </div>
                            </div>
                            <a href="detail_donasi.php?id=<?= $campaign['id'] ?>" class="btn btn-primary">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">Belum ada kampanye donasi.</p>
        <?php endif; ?>
    </div>
</div>

<!-- footer Section -->
<section id="footer">
 <div class="container">
    <div class="footer-content">
      <div class="footer-left">
        <p class="brand-name">AIVACARE</p>
        <p class="copyright">© 2024 AIVA - Platform Donasi. Semua hak dilindungi.</p>
      </div>
      <div class="footer-right">
        <p class="fs-5">Social Media</p>
        <div class="social-icons">
          <a href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"/></svg> </i></a>
          <a href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 251 256"><path d="M149.079 108.399L242.33 0h-22.098l-80.97 94.12L74.59 0H0l97.796 142.328L0 256h22.1l85.507-99.395L175.905 256h74.59L149.073 108.399zM118.81 143.58l-9.909-14.172l-78.84-112.773h33.943l63.625 91.011l9.909 14.173l82.705 118.3H186.3l-67.49-96.533z"/></svg></i></a>
          <a href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M19 10.56a6.57 6.57 0 0 1-3.838-1.229v5.588a5.082 5.082 0 1 1-4.38-5.035v2.81a2.33 2.33 0 1 0 1.63 2.225V4h2.75q-.002.35.06.694A3.82 3.82 0 0 0 16.906 7.2c.621.41 1.35.629 2.094.628z"/></svg></i></a>
        </div>
      </div>
    </div>
  </div>
 </section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Tutup koneksi database
$conn->close();
?>
