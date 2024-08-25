<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
?>

<body>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-primary mb-4">Go to Home</a>
        
        <div class="card">
            <div class="card-header">
                <h3>Add Buku</h3>
            </div>
            <div class="card-body">
                <form action="add.php" method="post" name="form1">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_penerbit" class="form-label">Penerbit</label>
                        <select class="form-select" id="id_penerbit" name="id_penerbit" required>
                            <?php 
                                while($penerbit_data = mysqli_fetch_array($penerbit)) {         
                                    echo "<option value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_pengarang" class="form-label">Pengarang</label>
                        <select class="form-select" id="id_pengarang" name="id_pengarang" required>
                            <?php 
                                while($pengarang_data = mysqli_fetch_array($pengarang)) {         
                                    echo "<option value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_katalog" class="form-label">Katalog</label>
                        <select class="form-select" id="id_katalog" name="id_katalog" required>
                            <?php 
                                while($katalog_data = mysqli_fetch_array($katalog)) {         
                                    echo "<option value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qty_stok" class="form-label">Qty Stok</label>
                        <input type="text" class="form-control" id="qty_stok" name="qty_stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_pinjam" class="form-label">Harga Pinjam</label>
                        <input type="text" class="form-control" id="harga_pinjam" name="harga_pinjam" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="Submit">Add</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $isbn = $_POST['isbn'];
            $judul = $_POST['judul'];
            $tahun = $_POST['tahun'];
            $id_penerbit = $_POST['id_penerbit'];
            $id_pengarang = $_POST['id_pengarang'];
            $id_katalog = $_POST['id_katalog'];
            $qty_stok = $_POST['qty_stok'];
            $harga_pinjam = $_POST['harga_pinjam'];
            
            include_once("connect.php");

            $result = mysqli_query($conn, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
            
            header("Location:index.php");
        }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
