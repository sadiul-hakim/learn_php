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


function sumMyNumbers(...$x) {
  $n = 0;
  $len = count($x);
  for($i = 0; $i < $len; $i++) {
    $n += $x[$i];
  }
  return $n;
}

$a = sumMyNumbers(5, 2, 6, 2, 7, 7);
echo $a;

// You can only have one argument with variable length, and it has to be the last argument.
function myFamily($lastname, ...$firstname) {
  $txt = "";
  $len = count($firstname);
  for($i = 0; $i < $len; $i++) {
    $txt = $txt."Hi, $firstname[$i] $lastname.<br>";
  }
  return $txt;
}

$a = myFamily("Doe", "Jane", "John", "Joey");
echo $a;

echo "<br>";

// Passing Arguments by Reference
function add_five(&$value) {
  $value += 5;
}

$num = 2;
add_five($num);
echo $num;
?>

<?php declare(strict_types=1); // strict requirement

function addNumbers(int $a, int $b) {
  return $a + $b;
}
echo addNumbers(5, "5 days");
// since "5 days" is not an integer, an error will be thrown

/**
 * PHP is a Loosely Typed Language
* In the examples above, notice that we did not have to tell PHP which data type the variable is.

* PHP automatically associates a data type to the variable, depending on its value. Since the data types are not set, you can do things like adding a string to an integer without causing an error.

* From PHP 7, type declarations were added. This gives us an option to specify the expected data type when declaring a function, and by adding the strict declaration, it will throw a "Fatal Error" if the data type mismatches.

*To specify strict mode, we need to set declare(strict_types=1);. This must be on the very first line of the PHP file.

* In the following example we send both a number and a string to the function, but here we have added the strict declaration:
 */


// PHP Return Type Declarations

function addNumbers2(float $a, float $b) : float {
  return $a + $b;
}
echo addNumbers2(1.2, 5.2);
?>