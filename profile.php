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

    <style>
        /* Sidebar Styles */
        .sidenav {
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            position: fixed;
            top: 0;
            left: -250px;
            transition: all 0.3s ease-in-out;
            z-index: 1050;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidenav.active {
            left: 0;
        }
        .sidenav a {
            color: #000;
            padding: 15px;
            display: block;
            text-decoration: none;
        }
        .sidenav a:hover {
            background-color: #e9ecef;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1049;
        }
        .overlay.active {
            display: block;
        }

        /* Profil Card */
        .profile-card {
            background-color: #e9ecef;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 100px;
        }
        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            object-fit: cover;
        }
        .profile-info {
            flex: 1;
            margin-left: 20px;
        }

        /* Footer Styles */
        .footer {
            background-color: #d00000;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .footer .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidenav" class="sidenav">
        <a href="home_page_login.php">Home</a>
        <a href="#">Profil</a>
        <a href="Login-Berdonasi.php">Donasi</a>
        <a href="home_page_login.php#About-us">Tentang</a>
        <a href="logout.php">Logout</a>
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
 <!-- Tolong aidin kerja footer -->
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