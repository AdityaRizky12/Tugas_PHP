<?php 

$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT buku.judul, pengarang.nama_pengarang, penerbit.nama_penerbit 
FROM buku 
JOIN pengarang ON buku.id_pengarang = pengarang.id_pengarang
JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Judul: " . $row["judul"] . " - Pengarang: " . $row["nama_pengarang"] . " - Penerbit: " . $row["nama_penerbit"] . "<br>";
    } 
} else {
    echo "0 hasil";
}

$conn->close();
?> 

