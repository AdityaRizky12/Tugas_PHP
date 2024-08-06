<?php
    //soal persegi
    $soal = "1.Sebuah kebun berbentuk persegi panjang memiliki panjang sisi 8 meter.Berapakah luas kebun tersebut?";

    //menghitung luas
    $sisi=8;
    $luas= $sisi * $sisi;
    
    //tampilkan soal dan hasil

   echo $soal . "<br>";
   echo "Luas = sisi * sisi <br>";
   echo "Luas = $sisi * $sisi <br>";
   echo "Luas kebun berbentuk persegi tersebut adalah" . $luas . "meter persegi";
   echo "<br> <br>";
   //soal persegi panjang
   $soal1 = "2.Pak mamat memiliki lemari yang panjangnya adalah 10 dan lebarnya adalah 5.Berapa luas lemari tersebut?";
   
   //menghitung luas persegi panjang
   $panjang=10;
   $lebar=5;
   $luas= $panjang * $lebar;

   //tampilkan hasil

   echo $soal1 . "<br>";
   echo "Luas = panjang * lebar <br>";
   echo "Luas = $panjang * $lebar <br>";
   echo "Luas lemari tersebut adalah" .$luas . "meter persegi";
   echo "<br> <br>";

   //soal segitiga

   $soal2 = "3.Sebuah makanan kucing berbentuk segitiga dengan panjang alas 8 dan tinggi 5.Berapakah luas makanan kucing tersebut? ";
   
   $alas=8;
   $tinggi=5;

   //hitung luas
   $luas= 0.5 * $alas * $tinggi;

   //tampilkan soal dan cara menghitung

   echo $soal2 . "<br>";

   echo "Cara menghitung luas segitiga: <br>";
   echo "Luas = 0.5 * alas * tinggi <br>";
   echo "Luas = 0.5 * $alas * $tinggi <br>";
   echo "Luas makanan kucing tersebut adalah" . $luas . "meter persegi";
   
   echo "<br> <br>";

   $soal3= '4.Sebuah taman berbentuk lingkaran memiliki jari-jari 14.Luas taman tersebut adalah';

   $jarijari=14;
   
   //menghitung luas

   $luas= pi() * $jarijari * $jarijari;
   
   //tampilkan soal dan cara menghitung

   echo $soal3 . "<br>";
   echo "Cara menghitung luas lingkaran <br>";
   echo "Luas = pi() * jari-jari *jari-jari <br>";
   echo "Luas = pi() * $jarijari * $jarijari <br>";

   echo "Luas taman berbentuk lingkaran tersebut adalah" . $luas . "meter persegi";

   echo "<br> <br>";
      

   //soal layang-layang

   $soal4="5.Sebuah layang-layang memiliki panjang diagonal yang berbeda.Diagonal pertama 14,diagonal kedua 7.Berapa luas layang-layang tersebut";

   $diagonal1=14;
   $diagonal2=7;

   //menghitung luas
   $luas= 0.5 * $diagonal1 * $diagonal2;

   //tampilkan soal dan cara menghitung

   echo "$soal4" . "<br>";
   echo "cara menghitung luas layang-layang <br>";
   echo "Luas = 0.5 * diagonal1 * diagonal2 <br>";
   echo "Luas = 0.5 * $diagonal1 * $diagonal2 <br>";
   echo "Jadi luas sebuah layang-layang tersebut adalah" . $luas . " meter persegi"
?>