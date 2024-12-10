<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect jika belum login
    exit();
}

include("connection/koneksi.php");

// Ambil data dari form donasi
$user_id = $_SESSION['user_id'];  // ID pengguna yang sedang login
$campaign_id = $_POST['campaign_id'];  // ID kampanye yang dipilih
$jumlah_donasi = $_POST['jumlah_donasi'];  // Jumlah donasi yang dimasukkan

// Query untuk memasukkan transaksi ke database
$sql = "INSERT INTO transaksi (user_id, campaign_id, jumlah_donasi, status) 
        VALUES ('$user_id', '$campaign_id', '$jumlah_donasi', 'sukses')";

if ($conn->query($sql) === TRUE) {
    // Jika transaksi berhasil
    echo "Transaksi berhasil!";
    // Redirect ke halaman riwayat transaksi
    header("Location: riwayat_transaksi.php");  
} else {
    // Jika ada error
    echo "Error: " . $conn->error;
}
?>
