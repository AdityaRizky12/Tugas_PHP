<!DOCTYPE html>
<html>
<head>
    <title>Edit Katalog</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Katalog</h2>
        <a href="katalog.php" class="btn btn-primary mb-3">Go to Katalog</a>

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

        <form action="edit_katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
            <div class="form-group">
                <label for="id_katalog">ID Katalog</label>
                <input type="text" class="form-control" id="id_katalog" value="<?php echo htmlspecialchars($id_katalog); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="nama_katalog">Nama Katalog</label>
                <input type="text" class="form-control" id="nama_katalog" name="nama_katalog" value="<?php echo htmlspecialchars($nama_katalog); ?>" required>
            </div>
            <div class="form-group">
                <label for="isbn">Buku</label>
                <select class="form-control" id="isbn" name="isbn">
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
            </div>
            <div class="form-group">
                <label for="qty_stok">Qty Stok</label>
                <input type="text" class="form-control" id="qty_stok" name="qty_stok" required>
            </div>
            <div class="form-group">
                <label for="harga_pinjam">Harga Pinjam</label>
                <input type="text" class="form-control" id="harga_pinjam" name="harga_pinjam" required>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
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
                        echo '<div class="alert alert-success mt-3">Katalog and Buku updated successfully.</div>';
                        header("refresh:2;url=katalog.php");
                    } else {
                        echo '<div class="alert alert-danger mt-3">Error updating Buku: ' . mysqli_error($conn) . '</div>';
                    }
                }
            } else {
                echo '<div class="alert alert-danger mt-3">Error updating Katalog: ' . mysqli_error($conn) . '</div>';
            }
        }
        ?>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
