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

<html>
<head>    
    <title>Daftar Katalog dan Buku</title>
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

<a href="add_katalog.php">Add New Katalog</a><br/><br/>
 
<table class="table" width='80%' border=2>
    <tr>
        <th>ID Katalog</th> 
        <th>Nama Katalog</th>
        <th>ISBN</th>
        <th>Judul Buku</th>
        <th>Qty Stok</th>
        <th>Harga Pinjam</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($row = mysqli_fetch_array($katalog_buku)) {         
            echo "<tr>";
            echo "<td>".$row['id_katalog']."</td>";
            echo "<td>".$row['nama_katalog']."</td>";
            echo "<td>".$row['isbn']."</td>";
            echo "<td>".$row['judul']."</td>";
            echo "<td>".$row['qty_stok']."</td>";
            echo "<td>".$row['harga_pinjam']."</td>";
            echo "<td><a class='btn btn-primary' href='edit_katalog.php?id_katalog=".$row['id_katalog']."'>Edit Katalog</a> | <a class='btn btn-danger' href='delete_katalog.php?id_katalog=".$row['id_katalog']."'>Delete Katalog</a></td>";
            echo "</tr>";
        }
    ?>
</table>
</body>
</html>
