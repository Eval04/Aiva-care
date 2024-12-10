<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Koneksi database
require 'connection/koneksi.php';

// Ambil user ID dari sesi
$user_id = $_SESSION['user_id'];

// Query untuk mengambil data pengguna berdasarkan ID
$sql = "SELECT nama, email, gambar_profile FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Pastikan user ditemukan
if ($user) {
    $nama = htmlspecialchars($user['nama']);
    $email = htmlspecialchars($user['email']);
    // Cek apakah gambar profil ada, jika tidak, gunakan gambar default
    $gambar_profile = !empty($user['gambar_profile']) ? htmlspecialchars($user['gambar_profile']) : 'Default_image.jpg';
} else {
    // Jika tidak ada data pengguna ditemukan (harusnya tidak terjadi jika login sudah benar)
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil AIVA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ccss/home_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ccss/profile.css">

   
</head>
<body>
    <!-- Sidebar -->
    <div id="sidenav" class="sidenav">
        <a href="home_page_login.php">Home</a>
        <a href="#">Profil</a>
        <a href="Login-Berdonasi.php">Donasi</a>
        <a href="home_page_login.php#About-us">Tentang</a>
        <a href="riwayat.php">Riwayat</a>
        <a href="logout.php" class="logout-link">Logout <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#ffffff" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/></svg></a>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div><button class="navbar-toggler" id="toggleButton" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </div>
            <a class="navbar-brand" href="home_page_login.php">
                <img src="Asset/logo.png" alt="AIVA Logo" style="width: 70px;">
            </a>
        </div>
    </nav>

    <!-- Profil Section -->
    <div class="container mb-5">
        <div class="profile-card shadow-sm">
        <img src="img/<?php echo $gambar_profile; ?>" alt="User Image" style="width: 150px; height: 150px; object-fit: cover;">
            <div class="profile-info">
                <h2>Profil</h2>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $nama; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" readonly>
                    </div>
                </form>
            </div>
        </div>
        <div class="justify-content-end d-flex pt-3 mt-3">
            <a href="edit_profil.php" class="btn btn-danger">Edit Profil</a>
        </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const sidenav = document.getElementById('sidenav');
        const toggleButton = document.getElementById('toggleButton');
        const overlay = document.getElementById('overlay');

        // Toggle sidebar and overlay
        toggleButton.addEventListener('click', () => {
            sidenav.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        // Close sidebar when clicking outside
        overlay.addEventListener('click', () => {
            sidenav.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>