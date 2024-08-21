<?php
include_once("connect.php");

$id_penerbit = $_GET['id_penerbit'];

// Hapus data yang terkait di tabel buku terlebih dahulu
$result = mysqli_query($conn, "DELETE FROM buku WHERE id_penerbit='$id_penerbit'");

// Setelah itu, baru hapus data di tabel penerbit
$result = mysqli_query($conn, "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'");

// Setelah menghapus, redirect ke halaman utama penerbit
header("Location:penerbit.php");
exit;
?>
