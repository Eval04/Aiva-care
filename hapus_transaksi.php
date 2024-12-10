<?php
session_start();
include("connection/koneksi.php");

// Periksa apakah pengguna telah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_transaksi = intval($_GET['id']); // Ambil ID transaksi dari URL

    // Hapus transaksi dari database
    $sql = "DELETE FROM transaksi WHERE id = '$id_transaksi' AND user_id = '{$_SESSION['user_id']}'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Transaksi berhasil dihapus.'); window.location.href = 'riwayat.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus transaksi.'); window.location.href = 'riwayat.php';</script>";
    }
} else {
    echo "<script>alert('ID transaksi tidak ditemukan.'); window.location.href = 'riwayat.php';</script>";
}
?>
