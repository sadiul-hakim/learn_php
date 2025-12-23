<?php

// Use defined function
// In build function

// Simple function
function aFun()
{
    echo "Have fun <br/>";
}
// Returning value function
function sum2($a, $b)
{
    return $a + $b;
}
// Anonymous function
// Parameterized function
echo sum(10,20); // we can call function before
echo "<br/>";
function sum($a = 0, $b = 0) // 0 is default value of $a and $b. Start putting default values from last parameter.
{
    return $a + $b;
}
// Variable function

function var_func(){
    echo "I am variable function.<br/>";
}

$var = "var_func";
function main($var){
    $var(); // Callback. Passing a function as a parameter.
}

main($var);

// ----------------------------------------
aFun();
echo sum(1, 2);
echo "<br/>";
echo sum(1); // This 1 is value of $a not $b
echo "<br/>";
// --------------------------------------

// Nested function
function printFirstName(){
    echo "Sadiul <br/>";

    function printLastname(){
        echo "Hakim<br/>";
    }
}

printFirstName();
printLastname(); // Call nested function after calling parent one.