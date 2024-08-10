<?php 

$hero = [
    ["nama" => "claude" , "win" => 20 , "total" => 25,],
    ["nama" => "harith" , "win" => 16 , "total" => 22,],
    ["nama" => "ling" , "win" => 15 , "total" => 19,],
];

foreach ($hero as &$h) {
    $h ['total'] += 3;
    $h ['win'] += 2;
    if ($h ['total'] > 0) {
        $h['winrate'] = ($h ['win'] / $h ['total']) * 100;
    } else {
        $h['winrate'] = 0;
    }
}
unset($h);

echo "menampilkan winrate hero: <br>";
foreach ($hero as $h) {
    echo $h ['nama'] . ": " . number_format($h['winrate'] ,2 ) . "% <br>";
}

?>