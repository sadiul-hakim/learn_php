<?php

declare(strict_types=1);

class Math
{
    public const PI = 3.1416;

    function sum(int $a, int $b): int
    {
        return $a + $b;
    }

    function circleArea(float $r) : float{
        
        // $this->PI     // ❌ constants are NOT properties
        return self::PI * ($r**2);
    }
}

$math = new Math();
echo $math -> sum(10,20);
echo "<br/>";
echo $math -> circleArea(10.1);
echo "<br/>";
echo Math::PI;