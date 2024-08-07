<?php

echo "Bilangan genap : ";

for ($i=1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}

echo "<br>";

echo "Bilangan ganjil : ";

for ($i=1; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}


echo "<br>";


$teman = ["Agis" => 17, "Abhi" => 17, "Roman" => 17 , "Ferdy" => 17];

foreach ($teman as $nama => $umur) {
    echo "Nama Teman: $nama , Umur: $umur <br>";
}



?>