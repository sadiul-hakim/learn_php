<?php

function operate(int $a, int $b, string $option): int | float
{
    return match ($option) {
        'x' => $a + $b,
        'y' => $a / $b
    };
}

echo operate(a:10,b:20,option:'x');