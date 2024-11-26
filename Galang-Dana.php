<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galang Donasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include("connection/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $no_rek = $_POST['no_rek'];
    $alamat = $_POST['alamat'];
    $judul_donasi = $_POST['judul_donasi'];
    $kategori = $_POST['kategori'];
    $opsi_bank = $_POST['opsi_bank'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah_donasi = $_POST['jumlah_donasi'];
    $tenggat_waktu = $_POST['tenggat_waktu'];

    // Validasi input
    if (empty($nama) || empty($email) || empty($no_telp) || empty($judul_donasi) || empty($jumlah_donasi) || empty($tenggat_waktu)) {
        die("<div class='alert alert-danger'>Harap isi semua data yang diperlukan!</div>");
    }

    // Validasi gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        die("<div class='alert alert-danger'>File yang diunggah bukan gambar!</div>");
    }

    // Upload gambar
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        die("<div class='alert alert-danger'>Gagal mengunggah gambar.</div>");
    }

    // Insert data menggunakan prepared statements
    $stmt = $conn->prepare("INSERT INTO campaign (nama, email, no_telp, no_rek, alamat, judul_donasi, kategori, opsi_bank, deskripsi, jumlah_donasi, tenggat_waktu, gambar)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssdss", $nama, $email, $no_telp, $no_rek, $alamat, $judul_donasi, $kategori, $opsi_bank, $deskripsi, $jumlah_donasi, $tenggat_waktu, $target_file);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Donasi berhasil dibuat!</div>";
    } else {
        echo "<div class='alert alert-danger'>Terjadi kesalahan saat menyimpan data. Silakan coba lagi.</div>";
    }

    $stmt->close();
}

$conn->close();
?>


<div class="container my-5">
        <h2 class="text-center mb-4">Galang Donasi</h2>
        <form class="border p-4 shadow-sm bg-light" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar (Disarankan format Landscape)</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="col-md-6">
                    <label for="judul_donasi" class="form-label">Judul Donasi</label>
                    <input type="text" class="form-control" id="judul_donasi" name="judul_donasi" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                </div>
                <div class="col-md-6">
                    <label for="opsi_bank" class="form-label">Opsi Bank</label>
                    <input type="text" class="form-control" id="opsi_bank" name="opsi_bank">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_rek" class="form-label">No Rek</label>
                    <input type="text" class="form-control" id="no_rek" name="no_rek" required>
                </div>
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jumlah_donasi" class="form-label">Jumlah Donasi yang Dibutuhkan</label>
                    <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" required>
                </div>
                <div class="col-md-6">
                    <label for="tenggat_waktu" class="form-label">Tenggat Waktu Donasi</label>
                    <input type="date" class="form-control" id="tenggat_waktu" name="tenggat_waktu">
                </div>
            </div>
            <button type="submit" class="btn btn-danger w-100">Buat</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>