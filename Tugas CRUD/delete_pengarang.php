<?php
include_once("connect.php");

$id_pengarang = $_GET['id_pengarang'];

// Hapus data yang terkait di tabel buku terlebih dahulu
$result = mysqli_query($conn, "DELETE FROM buku WHERE id_pengarang='$id_pengarang'");

// Setelah itu, baru hapus data di tabel pengarang
$result = mysqli_query($conn, "DELETE FROM pengarang WHERE id_pengarang='$id_pengarang'");

// Setelah menghapus, redirect ke halaman utama pengarang
header("Location:pengarang.php");
exit;
?>
