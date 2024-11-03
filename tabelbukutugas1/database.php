<?php
// Informasi untuk koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'prakweb_2024_c_223040056';

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Mengecek apakah koneksi berhasil atau gagal
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
