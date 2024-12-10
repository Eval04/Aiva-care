<?php
// Koneksi ke database
include("connection/koneksi.php");

// Pesan untuk notifikasi
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $nama = $_POST['nama']; // Ambil input nama dari form

    // Validasi input
    if (empty($email) || empty($password) || empty($confirm_password) || empty($nama)) {
        $message = 'Semua field harus diisi!';
    } elseif ($password !== $confirm_password) {
        $message = 'Password dan Konfirmasi Password tidak cocok!';
    } else {
        // Periksa apakah email sudah terdaftar
        $check_email_sql = "SELECT * FROM users WHERE email = ?";
        $check_email_stmt = $conn->prepare($check_email_sql);
        $check_email_stmt->bind_param('s', $email);
        $check_email_stmt->execute();
        $check_email_result = $check_email_stmt->get_result();

        if ($check_email_result->num_rows > 0) {
            $message = 'Email sudah terdaftar!';
        } else {
            // Hashing password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Simpan data pengguna ke database
            $sql = "INSERT INTO users (email, nama, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $email, $nama, $hashed_password);

            if ($stmt->execute()) {
                $message = 'Registrasi berhasil! Silakan login.';
            } else {
                $message = 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aiva Care - Register</title>
    <link rel="stylesheet" href="ccss/style.css">

    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 30rem;">
        <div class="text-center">
            <img src="Asset/logo.png" alt="Aiva Care Logo" style="width: 60px;" class="mb-3">
            <h4 class="mb-4">Daftar Akun Baru</h4>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert alert-warning text-center" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <!-- nama input -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="nama" class="form-control" id="nama" name="nama" placeholder="Username Kamu" required>
            </div>
            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your@email.com" required>
            </div>
            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Buat Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password kamu" required>
            </div>
            <!-- Confirm Password Input -->
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password kamu" required>
            </div>
            <!-- Register Button -->
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <div class="text-center mt-3">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
