<?php
// Koneksi ke database
include("connection/koneksi.php");

// Pesan untuk notifikasi
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if (empty($email) || empty($password) || empty($confirm_password)) {
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
            $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $email, $hashed_password);

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
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 30rem;">
        <div class="text-center">
            <img src="img/Sircle logo.png" alt="Aiva Care Logo" style="width: 80px;" class="mb-3">
            <h4 class="mb-4">Daftar Akun Baru</h4>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert alert-warning text-center" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
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
