<?php
include_once("connect.php");
$isbn = $_GET['isbn'];

// Mengambil data buku berdasarkan ISBN
$buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
$penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
$pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
$katalog = mysqli_query($conn, "SELECT * FROM katalog");

while ($buku_data = mysqli_fetch_array($buku)) {
    $judul = $buku_data['judul'];
    $isbn = $buku_data['isbn'];
    $tahun = $buku_data['tahun'];
    $id_penerbit = $buku_data['id_penerbit'];
    $id_pengarang = $buku_data['id_pengarang'];
    $id_katalog = $buku_data['id_katalog'];
    $qty_stok = $buku_data['qty_stok'];
    $harga_pinjam = $buku_data['harga_pinjam'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Buku</h2>

    <form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
        <div class="form-group row">
            <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="isbn" value="<?php echo $isbn; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $judul; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10">
                <input type="text" name="tahun" class="form-control" id="tahun" value="<?php echo $tahun; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_penerbit" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
                <select name="id_penerbit" class="form-control" id="id_penerbit" required>
                    <?php 
                        while ($penerbit_data = mysqli_fetch_array($penerbit)) {         
                            echo "<option value='".$penerbit_data['id_penerbit']."'".($penerbit_data['id_penerbit'] == $id_penerbit ? ' selected' : '').">".$penerbit_data['nama_penerbit']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_pengarang" class="col-sm-2 col-form-label">Pengarang</label>
            <div class="col-sm-10">
                <select name="id_pengarang" class="form-control" id="id_pengarang" required>
                    <?php 
                        while ($pengarang_data = mysqli_fetch_array($pengarang)) {         
                            echo "<option value='".$pengarang_data['id_pengarang']."'".($pengarang_data['id_pengarang'] == $id_pengarang ? ' selected' : '').">".$pengarang_data['nama_pengarang']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_katalog" class="col-sm-2 col-form-label">Katalog</label>
            <div class="col-sm-10">
                <select name="id_katalog" class="form-control" id="id_katalog" required>
                    <?php 
                        while ($katalog_data = mysqli_fetch_array($katalog)) {         
                            echo "<option value='".$katalog_data['id_katalog']."'".($katalog_data['id_katalog'] == $id_katalog ? ' selected' : '').">".$katalog_data['nama']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="qty_stok" class="col-sm-2 col-form-label">Qty Stok</label>
            <div class="col-sm-10">
                <input type="text" name="qty_stok" class="form-control" id="qty_stok" value="<?php echo $qty_stok; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="harga_pinjam" class="col-sm-2 col-form-label">Harga Pinjam</label>
            <div class="col-sm-10">
                <input type="text" name="harga_pinjam" class="form-control" id="harga_pinjam" value="<?php echo $harga_pinjam; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>

    <?php
        if (isset($_POST['update'])) {
            $isbn = $_GET['isbn'];
            $judul = $_POST['judul'];
            $tahun = $_POST['tahun'];
            $id_penerbit = $_POST['id_penerbit'];
            $id_pengarang = $_POST['id_pengarang'];
            $id_katalog = $_POST['id_katalog'];
            $qty_stok = $_POST['qty_stok'];
            $harga_pinjam = $_POST['harga_pinjam'];

            $result = mysqli_query($conn, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn'");

            header("Location: index.php");
        }
    ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
