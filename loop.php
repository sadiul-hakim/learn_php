<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i;
    echo "<br/>";
}

$j = 100;

while ($j >= 0) {
    if ($j === 50) {
        break;
    }

    if ($j === 70) {
        $j--;
        continue;
    }

    echo $j . "<br/>";
    $j--;
}