<?php
include_once("connect.php");

// Ambil data buku yang terkait dengan katalog
$buku = mysqli_query($conn, "SELECT * FROM buku");
?>

<html>
<head>
    <title>Add Katalog</title>
</head>

<body>
    <a href="katalog.php">Go to Katalog</a>
    <br/><br/>

    <form action="add_katalog.php" method="post" name="form1">
        <table width="50%" border="0">
            <tr> 
                <td>ID Katalog</td>
                <td><input type="text" name="id_katalog"></td>
            </tr>
            <tr> 
                <td>Nama Katalog</td>
                <td><input type="text" name="nama_katalog"></td>
            </tr>
            <tr> 
                <td>Buku</td>
                <td>
                    <select name="isbn">
                        <?php 
                            while($buku_data = mysqli_fetch_array($buku)) {         
                                echo "<option value='".$buku_data['isbn']."'>".$buku_data['judul']."</option>";
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
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
    // Check if form is submitted, insert form data into katalog table.
    if(isset($_POST['Submit'])) {
        $id_katalog = $_POST['id_katalog'];
        $nama_katalog = $_POST['nama_katalog'];
        $isbn = $_POST['isbn'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        // Insert new katalog
        $result = mysqli_query($conn, "INSERT INTO katalog (id_katalog, nama) VALUES ('$id_katalog', '$nama_katalog')");

        if ($result) {
            // Update buku to link it to the new katalog and set additional fields
            $update_buku = mysqli_query($conn, "UPDATE buku SET id_katalog='$id_katalog', qty_stok='$qty_stok', harga_pinjam='$harga_pinjam' WHERE isbn='$isbn'");
            
            if ($update_buku) {
                // Redirect to katalog page after successful update
                header("Location:katalog.php");
            } else {
                echo "Error updating buku: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting katalog: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
