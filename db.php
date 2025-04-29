<?php
$host = "localhost";
$user = "root";      // ganti jika username MySQL kamu beda
$pass = "";          // ganti kalau pakai password
$db   = "toko_fotocopy";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
