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

// Ambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email']; // Ini tidak akan diubah, hanya untuk validasi
$gambar_profile = $_FILES['gambar_profile'] ?? null;

// Validasi gambar (jika ada)
if ($gambar_profile && $gambar_profile['error'] == 0) {
    $target_dir = "img/";
    $file_name = basename($gambar_profile['name']);
    $target_file = $target_dir . $file_name;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi format file gambar
    if (in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
        // Pindahkan gambar ke folder 'img/'
        if (move_uploaded_file($gambar_profile['tmp_name'], $target_file)) {
            $gambar_profile = $file_name;
        } else {
            die("Gagal mengunggah gambar.");
        }
    } else {
        die("Hanya format gambar JPG, JPEG, PNG, dan GIF yang diperbolehkan.");
    }
} else {
    // Jika tidak ada gambar yang diunggah, gunakan gambar lama
    $sql = "SELECT gambar_profile FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $gambar_profile = $user['gambar_profile'];
}

// Query untuk memperbarui data pengguna
$sql = "UPDATE users SET nama = ?, gambar_profile = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nama, $gambar_profile, $user_id);

if ($stmt->execute()) {
    // Redirect kembali ke halaman profil
    header("Location: profile.php");
    exit();
} else {
    echo "Terjadi kesalahan saat memperbarui profil: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
