<?php
//soal kubus
$soalVol = "1.Adit memiliki sebuah mainan rubik berbentuk kubus yang panjang setiap sisinya adalah 6.Berapakah volume rubik tersebut?";

$sisi=6;

//menghitung volume

$volume = $sisi * $sisi *$sisi;

//menampilkan cara menghitung

 echo "$soalVol" . "<br>";

 echo "Cara menghitung volume kubus <br>";
 echo "Volume = sisi * sisi *sisi <br>";
 echo "Volume = $sisi * $sisi * $sisi <br>";
 echo "Jadi volume rubik berbentuk kubus tersebut adalah" . $volume . "meter kubik";


 echo "<br> <br>";

//soal balok

$soalVol1 = "2.Pak Andi memiliki balok kayu yang panjangnya 10 m,lebar 6 m,dan tinggi 7 m.Berapakah Volume balok kayu tersebut?";

$panjang=10;
$lebar=6;
$tinggi=7;

//menghitung volume

$volume = $panjang * $lebar * $tinggi;

//menampilkan cara menghitung

echo "$soalVol1" . "<br>";

echo "Cara menghitung volume balok <br>";
echo "Volume = panjang * lebar * tinggi <br>";
echo "Volume = $panjang * $lebar * $tinggi <br>";
echo "Jadi Volume balok kayu tersebut adalah" . $volume . " meter kubik";
echo "<br> <br>";

//soal kerucut


$soalVol2 = "3.Seorang memiliki tumpukan jerami berbentuk kerucut.Jari-jari dasar tumpukan jerami tersebut adalah 7 m dan tinggi 10 meter.Berapakah volume tumpukan jerami tersebut?";

$jarijari=7;
$tinggi=10;

//menghitung volume

$volume = 1/3 * pi() * $jarijari * $jarijari * $tinggi;

//menapilkan cara menghitung

echo "$soalVol2" . "<br>";
echo "Cara menghitung volume kerucut";
echo "Volume = 1/3 * pi() * jari-jari *jari-jari * tinggi <br>";
echo "Volume = 1/3 * pi() * $jarijari * $jarijari * $tinggi <br>";

echo "Jadi Volume tumpukan jerami berbentuk kercut adalah" .  $volume . " meter kubik"

?>