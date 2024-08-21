<?php
include_once("connect.php");

if (isset($_GET['id_katalog'])) {
    $id_katalog = $_GET['id_katalog'];

    // Mulai transaksi
    mysqli_begin_transaction($conn);
    try {
        // Hapus buku yang terkait dengan katalog ini
        $delete_buku = mysqli_query($conn, "UPDATE buku SET id_katalog=NULL WHERE id_katalog='$id_katalog'");
        
        if (!$delete_buku) {
            throw new Exception("Error updating buku: " . mysqli_error($conn));
        }

        // Hapus katalog
        $delete_katalog = mysqli_query($conn, "DELETE FROM katalog WHERE id_katalog='$id_katalog'");

        if (!$delete_katalog) {
            throw new Exception("Error deleting katalog: " . mysqli_error($conn));
        }

        // Commit transaksi
        mysqli_commit($conn);

        echo "Katalog dan buku terkait telah dihapus.";
        header("Location: katalog.php");
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($conn);
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    echo "ID Katalog tidak ditemukan.";
}
?>
