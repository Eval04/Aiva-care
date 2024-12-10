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

// Default data jika user tidak ditemukan
$nama = htmlspecialchars($user['nama'] ?? 'User');
$email = htmlspecialchars($user['email'] ?? 'guest@example.com');
$gambar_profile = htmlspecialchars($user['gambar_profile'] ?? 'default_image.jpg');

// Pastikan gambar profil sesuai
$gambar_profile_path = 'img/' . $gambar_profile;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil AIVA</title>

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="ccss/edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="tombol_kebali container-fluid mt-3"> 
            <a href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="60" viewBox="0 0 24 24"><path fill="#000000" d="m7.825 13l4.9 4.9q.3.3.288.7t-.313.7q-.3.275-.7.288t-.7-.288l-6.6-6.6q-.15-.15-.213-.325T4.426 12t.063-.375t.212-.325l6.6-6.6q.275-.275.688-.275t.712.275q.3.3.3.713t-.3.712L7.825 11H19q.425 0 .713.288T20 12t-.288.713T19 13z"/></svg></a>
    </div>
    </nav>
    <div class="container">
        <h2 class="my-4">Edit Profil</h2>
        <form action="update_profil.php" method="POST" enctype="multipart/form-data">
            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
            </div>

            <!-- Gambar Profil -->
            <div class="mb-3">
                <label for="gambar_profile" class="form-label">Gambar Profil</label>
                <input type="file" class="form-control" id="gambar_profile" name="gambar_profile">
                <img src="<?php echo $gambar_profile_path; ?>" alt="User Image" class="mt-3" style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            <button type="submit" class="btn btn-primary">Update Profil</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
