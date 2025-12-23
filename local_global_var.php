<?php

declare(strict_types=1);

$app_name="Sample app"; // Global in this file.
function getName(): void
{
    $name = "Hakim"; // This variable is local to this function
    print($name);

    global $app_name; // To access global variable inside function make it global in that function, or pass the variable as parameter
    $app_name = "New App"; // we can override global variable.
    print($app_name); 
}

getName();
echo "<br/>";
echo($app_name);

/**
 * 
 * Suppose we have a global var called $name="name1"; and we have a function called fun1() and this function has a variable $name="name2".
 * If we print echo $name:
 *  Inside fun1() -> name2
 *  Outside -> name1
 * 
 * Local variables has priority.
 * If we want to get global variables we have to declare that variable as global $name; inside the function.
 * 
 * If we have another function fun2() inside fun1() and fun2 has $name="name3"; If we print
 *  fun2() -> name3
 *  fun1() -> name2 
 *  outside -> name1
 * 
 * we would always get local variable value. Inside fun2 if we name global $name; we would get global variable value name1 not name2.
 */