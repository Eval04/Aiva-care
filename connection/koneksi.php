<?php
// Konfigurasi koneksi database
$host = 'localhost'; // Ganti jika host bukan localhost
$username = 'root';  // Ganti sesuai username database Anda
$password = '';      // Ganti sesuai password database Anda
$dbname = 'aiva_care'; // Nama database yang akan diuji

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);
?>
