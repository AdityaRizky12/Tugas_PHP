<?php
include_once("connect.php");

// Mengambil data dari tabel katalog dan mengaitkan dengan tabel buku
$query = "
    SELECT katalog.id_katalog, katalog.nama AS nama_katalog, 
           buku.isbn, buku.judul, buku.qty_stok, buku.harga_pinjam
    FROM katalog
    LEFT JOIN buku ON buku.id_katalog = katalog.id_katalog
    ORDER BY katalog.nama ASC, buku.judul ASC
";

$katalog_buku = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Katalog dan Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
<div class="container mt-4">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Library</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Buku</a></li>
                <li class="nav-item"><a class="nav-link" href="penerbit.php">Penerbit</a></li>
                <li class="nav-item"><a class="nav-link" href="pengarang.php">Pengarang</a></li>
                <li class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
            </ul>
        </div>
    </nav>

    <!-- Add New Katalog Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="add_katalog.php" class="btn btn-success">Add New Katalog</a>
    </div>

    <!-- Katalog dan Buku Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID Katalog</th>
                <th scope="col">Nama Katalog</th>
                <th scope="col">ISBN</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Qty Stok</th>
                <th scope="col">Harga Pinjam</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                while($row = mysqli_fetch_array($katalog_buku)) {         
                    echo "<tr>";
                    echo "<td>".$row['id_katalog']."</td>";
                    echo "<td>".$row['nama_katalog']."</td>";
                    echo "<td>".$row['isbn']."</td>";
                    echo "<td>".$row['judul']."</td>";
                    echo "<td>".$row['qty_stok']."</td>";
                    echo "<td>Rp. ".number_format($row['harga_pinjam'], 2, ',', '.')."</td>";    
                    echo "<td>
                            <a class='btn btn-primary btn-sm' href='edit_katalog.php?id_katalog=".$row['id_katalog']."'>Edit Katalog</a> 
                            <a class='btn btn-danger btn-sm' href='delete_katalog.php?id_katalog=".$row['id_katalog']."' onclick='return confirm(\"Are you sure?\")'>Delete Katalog</a>
                          </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

