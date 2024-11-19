<?php
// Mulai sesi
session_start();

// Include file koneksi database
include ("connection/koneksi.php");

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($email) || empty($password)) {
        $error = "Email dan password harus diisi!";
    } else {
        // Query untuk mengambil data pengguna berdasarkan email
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Jika email ditemukan
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan data pengguna ke sesi
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                // Redirect ke halaman utama
                header("Location: login_user.php");
                exit();
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Akun dengan email tersebut tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aiva Care</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 30rem;">
        <div class="text-center">
            <img src="img/Sircle logo.png" alt="Aiva Care Logo" style="width: 80px;" class="mb-3">
            <h4 class="mb-4">Login</h4>
        </div>
                <!-- Menampilkan pesan error -->
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="your@email.com" required>
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                    </div>
                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
