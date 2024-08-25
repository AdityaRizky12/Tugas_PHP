<?php
include_once("connect.php");

// Mengambil data dari tabel penerbit
$penerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY nama_penerbit ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerbit</title>
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

    <!-- Add New Penerbit Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="add_penerbit.php" class="btn btn-success">Add New Penerbit</a>
    </div>

    <!-- Penerbit Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID Penerbit</th> 
                <th scope="col">Nama Penerbit</th> 
                <th scope="col">Email</th> 
                <th scope="col">Nomor Telpon</th> 
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                while($penerbit_data = mysqli_fetch_array($penerbit)) {         
                    echo "<tr>";
                    echo "<td>".$penerbit_data['id_penerbit']."</td>";
                    echo "<td>".$penerbit_data['nama_penerbit']."</td>";
                    echo "<td>".$penerbit_data['email']."</td>";    
                    echo "<td>".$penerbit_data['telp']."</td>";    
                    echo "<td>".$penerbit_data['alamat']."</td>";    
                    echo "<td>
                            <a class='btn btn-primary btn-sm' href='edit_penerbit.php?id_penerbit=".$penerbit_data['id_penerbit']."'>Edit</a> 
                            <a class='btn btn-danger btn-sm' href='delete_penerbit.php?id_penerbit=".$penerbit_data['id_penerbit']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
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
