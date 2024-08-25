<?php
include_once("connect.php");

// Mengambil data dari tabel pengarang
$pengarang = mysqli_query($conn, "SELECT * FROM pengarang ORDER BY nama_pengarang ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengarang</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
<div class="container mt-4">
  
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

    <div class="d-flex justify-content-end mb-3">
        <a href="add_pengarang.php" class="btn btn-success">Add New Pengarang</a>
    </div>

    
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID Pengarang</th> 
                <th scope="col">Nama Pengarang</th> 
                <th scope="col">Nomor Telepon</th> 
                <th scope="col">Alamat</th> 
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                while($pengarang_data = mysqli_fetch_array($pengarang)) {         
                    echo "<tr>";
                    echo "<td>".$pengarang_data['id_pengarang']."</td>";
                    echo "<td>".$pengarang_data['nama_pengarang']."</td>";
                    echo "<td>".$pengarang_data['telp']."</td>";    
                    echo "<td>".$pengarang_data['alamat']."</td>";    
                    echo "<td>".$pengarang_data['email']."</td>";    
                    echo "<td>
                            <a class='btn btn-primary btn-sm' href='edit_pengarang.php?id_pengarang=".$pengarang_data['id_pengarang']."'>Edit</a> 
                            <a class='btn btn-danger btn-sm' href='delete_pengarang.php?id_pengarang=".$pengarang_data['id_pengarang']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
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
