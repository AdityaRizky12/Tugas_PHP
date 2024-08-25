<?php
include_once("connect.php");

// Mengambil data buku dengan join tabel pengarang, penerbit, dan katalog
$buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog 
                             FROM buku 
                             LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
                             LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                             LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
                             ORDER BY judul ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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

    <!-- Add New Buku Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="add.php" class="btn btn-success">Add New Buku</a>
    </div>

    <!-- Buku Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Judul</th>
                <th scope="col">Tahun</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Katalog</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga Pinjam</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                while($buku_data = mysqli_fetch_array($buku)) {         
                    echo "<tr>";
                    echo "<td>".$buku_data['isbn']."</td>";
                    echo "<td>".$buku_data['judul']."</td>";
                    echo "<td>".$buku_data['tahun']."</td>";    
                    echo "<td>".$buku_data['nama_pengarang']."</td>";    
                    echo "<td>".$buku_data['nama_penerbit']."</td>";    
                    echo "<td>".$buku_data['nama_katalog']."</td>";    
                    echo "<td>".$buku_data['qty_stok']."</td>";    
                    echo "<td>Rp. ".number_format($buku_data['harga_pinjam'], 2, ',', '.')."</td>";    
                    echo "<td>
                            <a class='btn btn-primary btn-sm' href='edit.php?isbn=".$buku_data['isbn']."'>Edit</a> 
                            <a class='btn btn-danger btn-sm' href='delete.php?isbn=".$buku_data['isbn']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
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
