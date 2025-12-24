<?php

declare(strict_types=1);

function sum(int ...$num): int
{

    $sum = 0;
    for ($i = 0; $i < count($num); $i++) {
        $sum += $num[$i];
    }

    return $sum;
}

function multiply(int ...$num): int
{

    $res = 0;
    for ($i = 0; $i < count($num); $i++) {
        $res *= $num[$i];
    }

    return $res;
}

