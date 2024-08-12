<?php

function VolumeKubus($sisi) {
echo "1.Diketahui sebuah kubus memiliki sisi $sisi cm.Berapakah volume kubus tersebut adalah? <br>";

$volume = $sisi * $sisi * $sisi;
echo "Volume = sisi * sisi * sisi <br>";
echo "Volume = $sisi * $sisi * $sisi <br>";
echo "Jadi volume kubus tersebut adalah $volume cm3 <br>";

}

VolumeKubus(8);

echo "<br>";

function VolumeBalok($panjang , $lebar ,$tinggi) {
echo "2.Diketahui sebuah balok memiliki panjang $panjang cm,lebar $lebar cm,tinggi $tinggi cm.Berapakah volume balok tersebut? <br>";

$volume = $panjang * $lebar * $tinggi;

echo "Volume = panjang * lebar * tinggi <br>";
echo "Volume =  $panjang * $lebar * $tinggi <br>";
echo "Jadi Volume balok tersebut adalah $volume cm3 <br>";
}
VolumeBalok(10 , 6 , 4);


echo "<br>";

function VolumePrisma($panjang , $lebar , $tinggi) {
echo "3.Diketahui sebuah Prisma memiliki panjang $panjang cm,lebar $lebar cm,dan tinggi $tinggi cm.Berapakah Volume prisma tersebut <br>";
$volume = $panjang * $lebar * $tinggi * 0.5;

echo "Volume = panjang * lebar * tinggi * 0.5 <br>";
echo "Volume = $panjang * $lebar * $tinggi * 0.5 <br>";
echo "Jadi volume prisma tersebut adalah $volume cm3 <br>";

}
VolumePrisma(12,8 ,7 );
 echo "<br>";

function VolumeTabung($jarijari , $tinggi) {
echo "4.Diketahui sebuah Tabung memiliki jari-jari $jarijari cm dan tinggi $tinggi cm.Berapakah Volume Tabung tersebut <br>";

$volume = pi() * $jarijari *$jarijari * $tinggi;

echo "Volume = pi () * jari-jari *jari-jari *tinggi <br>";
echo "Volume = pi () * $jarijari * $jarijari * $tinggi <br>";
echo "Jadi volume tabung tersebut adalah $volume cm3 <br>";
}

VolumeTabung(14 , 5);

 echo "<br>";

function VolumeBola($jarijari) {
echo "5.Sebuah bola memiliki jari jari $jarijari cm.Berapakah volume bola tersebut <br>";

$volume = 4/3 * pi() * $jarijari * $jarijari * $jarijari;
echo "Volume = 4/3 * pi() * jari-jari *jari-jari *jari-jari <br>";
echo "Volume = 4/3 * pi() * $jarijari * $jarijari *$jarijari <br>";
echo "jadi volume bola tersebut adalah $volume cm3";
}

VolumeBola(7);
?>