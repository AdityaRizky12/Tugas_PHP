<?php

//studi kasus nilai siswa yang lulus dan yang tidak lulus

$Kmm_nilai=75;

$nilai_Budi=80;
$nilai_Toni=65;

if ($nilai_Budi >= $Kmm_nilai) {
    echo "Budi mendapatkan nilai $nilai_Budi dan lulus dalam ujian <br>";
} else {
    echo "Budi mendapatkan nilai $nilai_Budi dan tidak lulus dalam ujian <br>";
}

if ($nilai_Toni >= $Kmm_nilai) {
    echo "Toni mendapatkan nilai $nilai_Toni dan lulus dalam ujian <br>";
} else {
    echo "Toni mendapatkan nilai $nilai_Toni dan tidak lulus dalam ujian <br>";
}


if ($nilai_Budi >= $nilai_Toni){
    echo "Nilai Budi lebih besar daripada nilai Toni <br>";
} else if ($nilai_Budi <= $nilai_Toni) {
    echo "Nilai Toni lebih besar daripada nilai Toni <br>";
} else {
    echo "Nilai Budi sama dengan Nilai Toni <br>";
}



?>