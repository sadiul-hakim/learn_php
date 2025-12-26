<?php

declare(strict_types=1);

namespace OOP\Creature;

class HumanProperties
{
    public static string $NAME = "name";
    public static string $AGE = "age";
    public static string $PROFESSION = "profession";
    public static string $GENDER = "gender";
}

echo "<br/>";
echo HumanProperties::$NAME;