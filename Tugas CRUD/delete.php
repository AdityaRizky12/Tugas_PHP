<?php
include_once("connect.php");

$isbn = $_GET['isbn'];

// Hapus data yang terkait di tabel detail_peminjaman terlebih dahulu
$result = mysqli_query($conn, "DELETE FROM detail_peminjaman WHERE isbn='$isbn'");

// Setelah itu, baru hapus data di tabel buku
$result = mysqli_query($conn, "DELETE FROM buku WHERE isbn='$isbn'");

// Setelah menghapus, redirect ke halaman utama
header("Location:index.php");
exit;

?>