<?php 
include ("connection/koneksi.php");

// Jalankan query untuk mengambil data kampanye
$sql = "SELECT * FROM campaigns";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="ccss/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="#"><img src="Asset/logo.jpg" alt="Aiva Care Logo" style="width: 60px;" class="mb-3">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Campaigns</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
    <h1 class="text-center mb-4">Daftar Kampanye Donasi</h1>
    <div class="row">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($campaign = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= $campaign['image'] ?>" class="card-img-top" alt="<?= $campaign['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $campaign['title'] ?></h5>
                        <p class="card-text"><?= $campaign['description'] ?></p>
                        
                        <?php 
                            $collected = $campaign['collected_amount'];
                            $target = $campaign['target_amount'];
                            $progress = ($target > 0) ? min(100, ($collected / $target) * 100) : 0; 
                        ?>
                        
                        <p class="card-text">
                            <strong>Terkumpul:</strong> Rp <?= number_format($collected, 0, ',', '.') ?> / 
                            Rp <?= number_format($target, 0, ',', '.') ?>
                        </p>
                            
                            <!-- Progress bar -->
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

                            <a href="#" class="btn btn-primary">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">Belum ada kampanye donasi.</p>
        <?php endif; ?>
    </div>
</div>

    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 AIVA - Platform Donasi. Semua hak dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Tutup koneksi setelah selesai
$conn->close();
?>