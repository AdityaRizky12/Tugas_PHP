<?php

function LuasPersegi($sisi) {
  echo "1.Sebuah persegi memiliki sisi $sisi cm.Berapakah luas bangun persegi tersebut <br>";
  $luas = $sisi * $sisi;

  echo "Luas persegi = sisi * sisi <br>";
  echo "Luas persegi = $sisi * $sisi <br>";

  echo "Jawaban: Luas persegi tersebut adalah $luas cm2 <br>";
}

LuasPersegi(6);    

echo "<br>";

function LuasPersegiPanjang($panjang , $lebar) {
    echo "2.Sebuah persegi panjang memiliki panjang $panjang dan lebar $lebar cm.Berapakah luas bangun persegi panjang tersebut <br>";

    $luas = $panjang * $lebar;
     
     echo "Luas persegi panjang = panjang * lebar <br> ";
    echo "Luas persegi panjang = $panjang * $lebar <br>";
    echo "Jawaban: jadi luas persegi panjang tersebut adalah $luas cm2 <br>";

}

LuasPersegiPanjang(8 , 5);

echo "<br>";

function LuasSegitiga($alas , $tinggi) {
   echo "3.Sebuah segitiga memiliki alas $alas dan tinggi $tinggi cm.Berapakah luas segitiga tersebut adalah <br>";
    $luas= $alas *  $tinggi * 0.5;

    echo "Luas Segitiga = alas * tinggi * 0.5 <br> ";
    echo "Luas Segitiga = $alas * $tinggi * 0.5 <br> ";
    echo "Jawaban: Jadi luas segitiga tersebut adalah $luas cm2 <br>";
}
LuasSegitiga (9 , 6);

echo "<br>";


function LuasLingkaran($jarijari) {
echo "4.Sebuah lingkaran memiliki jari-jari $jarijari cm.Berapakah luas lingkaran tersebut <br>";
$luas = pi() * $jarijari * $jarijari;

echo "Luas Lingkaran = pi() * jari-jari *jari-jari <br>";
echo "Luas lingkaran = pi () * $jarijari * $jarijari <br>";
echo "Jawaban: Jadi luas lingkaran tersebut adalah $luas cm2 <br>";
}

LuasLingkaran (7);

echo "<br>";

function Luaslayanglayang($diagonal1 , $diagonal2) {
echo "5.Sebuah layang-layang memiliki diagonal1 $diagonal1 dan diagonal2 $diagonal2 cm.Berapakah luas layang-layang tersebut <br>";

$luas = 0.5 * $diagonal1 * $diagonal2;

echo "Luas layang-layang = diagonal 1 * diagonal 2 * 0.5 <br>";
echo "Luas layang-layang = $diagonal1 * $diagonal2 * 0.5 <br>";
echo "Jawaban: Jadi luas layang-layang tersebut adalah $luas cm2 <br>";


}
Luaslayanglayang (9 , 8);
?>