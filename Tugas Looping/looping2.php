<?php

echo "<table border ='1'>";
echo "<tr> <th>No</th> <th>Nama</th> <th>kelas</th> </tr>";

for ($i=1; $i <=10 ; $i++) {
    echo "<tr> ";
    echo "<td>" . $i .  "</td>";
    echo "<td> Nama ke"  . $i . "</td>";
    echo "<td>Kelas" . (11 - $i) . "</td>";
    echo "</tr>";
}

echo "</table>";

?>