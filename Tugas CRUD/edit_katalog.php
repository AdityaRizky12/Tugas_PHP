<?php
include_once("connect.php");

$id_katalog = $_GET['id_katalog'];

// Ambil data katalog berdasarkan id_katalog
$katalog_query = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");
$katalog_data = mysqli_fetch_array($katalog_query);

if ($katalog_data) {
    $nama_katalog = $katalog_data['nama'];
}

// Ambil data buku terkait katalog
$buku_query = mysqli_query($conn, "SELECT * FROM buku WHERE id_katalog='$id_katalog'");
$buku_data = mysqli_fetch_all($buku_query, MYSQLI_ASSOC);

?>

<html>
<head>
    <title>Edit Katalog</title>
</head>
<body>
    <a href="katalog.php">Go to Katalog</a>
    <br/><br/>

    <form action="edit_katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
        <table width="50%" border="0">
            <tr> 
                <td>ID Katalog</td>
                <td><?php echo $id_katalog; ?></td>
            </tr>
            <tr> 
                <td>Nama Katalog</td>
                <td><input type="text" name="nama_katalog" value="<?php echo htmlspecialchars($nama_katalog); ?>"></td>
            </tr>
            <tr>
                <td>Buku</td>
                <td>
                    <select name="isbn">
                        <option value="">Pilih Buku</option>
                        <?php 
                        // Mengambil semua buku untuk dipilih
                        $all_buku_query = mysqli_query($conn, "SELECT * FROM buku");
                        while ($buku = mysqli_fetch_array($all_buku_query)) {
                            echo "<option value='".$buku['isbn']."'";
                            // Check if the current book is linked to this catalog
                            foreach ($buku_data as $buku_item) {
                                if ($buku_item['isbn'] == $buku['isbn']) {
                                    echo " selected";
                                    break;
                                }
                            }
                            echo ">".$buku['judul']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Qty Stok</td>
                <td><input type="text" name="qty_stok"></td>
            </tr>
            <tr>
                <td>Harga Pinjam</td>
                <td><input type="text" name="harga_pinjam"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
    <?php
    // Check if form is submitted, update catalog and book details
    if (isset($_POST['update'])) {
        $nama_katalog = $_POST['nama_katalog'];
        $isbn = $_POST['isbn'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        // Update katalog name
        $update_katalog = mysqli_query($conn, "UPDATE katalog SET nama='$nama_katalog' WHERE id_katalog='$id_katalog'");

        if ($update_katalog) {
            if ($isbn) {
                // Update buku with the new catalog ID
                $update_buku = mysqli_query($conn, "UPDATE buku SET id_katalog='$id_katalog', qty_stok='$qty_stok', harga_pinjam='$harga_pinjam' WHERE isbn='$isbn'");
                if ($update_buku) {
                    echo "Katalog and Buku updated successfully.";
                } else {
                    echo "Error updating Buku: " . mysqli_error($conn);
                }
            }
        } else {
            echo "Error updating Katalog: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
