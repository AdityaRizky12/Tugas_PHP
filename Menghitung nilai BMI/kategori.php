<?php

$nama = "Aditya Rizky Ramadhan";
$berat_badan =52;
$tinggi_badan =165;
 
//konversi tinggi badan dari cm ke meter
$tinggibadanmeter= $tinggi_badan / 100;

//menghitung BMI

$bmi = $berat_badan / ($tinggibadanmeter * $tinggibadanmeter);

//menentukan ketagori bmi

if ($bmi < 18.5) {
    $kategori = "kurus";
} elseif ($bmi >= 18.5 && $bmi < 24.9) {
    $kategori = "normal";
} elseif ($bmi >= 25 && $bmi <29.9) {
    $kategori = "gemuk";
} else {
    $kategori = "obesitas";
}

//tampilkan hasil

echo "Nama saya adalah $nama <br>";
echo "Berat badan saya adalah $berat_badan <br>";
echo "Tinggi badan saya adalah $tinggi_badan <br>";
echo "BMI saya adalah".  $bmi . "<br>";
echo "Saya termasuk kategori $kategori"


?>