<?php
include_once("connect.php");

// Mengambil data dari tabel penerbit
$penerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY nama_penerbit ASC");
?>

<html>
<head>    
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<center>
    <a href="index.php">Buku</a> |
    <a href="penerbit.php">Penerbit</a> |
    <a href="pengarang.php">Pengarang</a> |
    <a href="katalog.php">Katalog</a>
    <hr>
</center>

<a href="add_penerbit.php">Add New Penerbit</a><br/><br/>
 
<table class="table" width='80%' border=2>
    <tr>
        <th>ID Penerbit</th> 
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>Nomor Telpon</th> 
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id_penerbit']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";    
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";    
            echo "<td><a class='btn btn-primary' href='edit_penerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='delete_penerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";        
        }
    ?>
</table>
</body>
</html>
