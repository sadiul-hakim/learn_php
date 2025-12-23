<?php

// 1. Arithmetic operators
// +, -, *, /, %, **
//echo 10 ** 2; // Power
// 2. Assignment operators
// =, +=, -=, *=, /=, %=, **=
// 3. Comparison operators
// == (Equal), === (Identical, same type), !=, <> (Not Equal), !== (Not identical), >, <, >=, <=, <=> (Spaceship, returns -1,0,1. -1 is less that, 0 is equals, 1 is bigger than)
echo var_dump(10 == "10");
echo "<br/>";
echo var_dump(10 === "10");
echo "<br/>";
echo 10 <=> 11;
echo "<br/>";
// 4. Increment/Decrement operator
// ++, --
// 5. Logical operators
// and, or, xor (True if either $x or $y is true, but not both), &&, ||, !
echo var_dump(true xor false);
echo "<br/>";
echo var_dump(true xor true);
echo "<br/>";
// 6. String operators
$lastName = "Hakim";
echo "I am $lastName <br/>";
echo 'I am ' . $lastName . '<br/>';
$firstName = "Sadiul ";
$fullname = "";
$fullname .= $firstName;
$fullname .= $lastName;
echo $fullname . "<br/>";
// 7. Array operators
// 8. Conditional Operators
// ?:, ?? (Returns the value of $x. The value of $x is expr1 if expr1 exists, and is not NULL.If expr1 does not exist, or is NULL, the value of $x is expr2.Introduced in PHP 7)
echo $status = (empty($user)) ? "anonymous" : "logged in";
echo ("<br>");

echo $user = $_GET["user"] ?? "anonymous";
echo ("<br>");

// variable $color is "red" if $color does not exist or is null
echo $color = $color ?? "red";
