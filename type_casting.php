<?php

// Casting Types

$num = 10;
var_dump($num);
echo "<br/>";

$txt=(string) $num;
var_dump($txt);
echo "<br/>";

$flt=(float) $num;
var_dump($flt);
echo "<br/>";

$new_num=(integer) "10";
var_dump($new_num);
echo "<br/>";

$bol_num=(integer) true;
var_dump($bol_num);
echo "<br/>";

// $bol=(bool) 0;
$bol=(boolean) 0;
var_dump($bol);
echo "<br/>";

$array=(array) 10;
var_dump($array);
echo "<br/>";

$obj=(object) $num;
var_dump($obj);
echo "<br/>";

// Array can not be casted to string or string to array