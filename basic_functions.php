<?php

$txt="I am Hakim";
echo strlen($txt);
echo "<br/>";
var_dump($txt);
echo "<br/>";
echo date("d");
echo "<br/>";
echo date("l");
echo "<br/>";
echo date("F");
echo "<br/>";
echo is_string($txt);
echo "<br/>";
echo is_numeric($txt);
echo "<br/>";
echo is_null($txt);
echo "<br/>";
echo rand(1,10);
echo "<br/>";
echo random_int(1,100);
echo "<br/>";
echo substr("I am Hakim",5);
echo "<br/>";
echo substr("I am Hakim",-1);
die;// or die() or exit(), Kills code execution
echo "Will not be printed";
