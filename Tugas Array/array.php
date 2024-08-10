<?php 

$array = file_get_contents('data.json');
$data = json_decode($array, true);

echo "<table border='1'>";

echo "<tr> <th>No</th> <th>Nama</th> <th>Tanggal Lahir</th> <th>Umur</th> <th>Alamat</th> <th>Kelas</th> <th>Nilai</th> <th>Hasil</th> </tr>";

foreach ($data as $index => $siswa) {
    // Menghitung umur berdasarkan tahun lahir
    $tahun_sekarang = date("Y");
    $tahun_lahir = date("Y", strtotime($siswa['tanggal_lahir']));
    $umur = $tahun_sekarang - $tahun_lahir;

    // Menentukan hasil berdasarkan nilai
    if ($siswa['nilai'] >= 85) {
        $hasil = 'A';
    } else if ($siswa['nilai'] >= 70) {
        $hasil = 'B';
    } else if ($siswa['nilai'] >= 60) {
        $hasil = 'C';
    } else {
        $hasil = 'D';
    }

    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>" . $siswa['nama'] . "</td>";
    echo "<td>" . $siswa['tanggal_lahir'] . "</td>";  
    echo "<td>" . $umur . "</td>";                    
    echo "<td>" . $siswa['alamat'] . "</td>";
    echo "<td>" . $siswa['kelas'] . "</td>";
    echo "<td>" . $siswa['nilai'] . "</td>";
    echo "<td>" . $hasil . "</td>";
    echo "</tr>";
}

echo "</table>";

?>
