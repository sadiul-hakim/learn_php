<?php
    $age = 17;

    if($age >= 18){
        echo "you are adult <br/>";
    } else{
        echo "You are not adult <br/>";
    }

    $mark = 66;

    if($mark < 33){
        echo "Fail<br/>";
    } elseif($mark > 33 && $mark <= 80){
        echo "Pass <br/>";
    } elseif ($mark > 80 && $mark <= 100){
        echo "A+<br/>";
    } else{
        echo "Invalid<br/>";
    }

    $mark=81;

    switch($mark){
        case $mark < 33:
            echo "Fail<br/>";
            break;
        case $mark > 33 && $mark <= 80:
            echo "Pass <br/>";
            break;
        case $mark > 80 && $mark <= 100:
            echo "A+<br/>";
            break;
        default:
            echo "Invalid<br/>";
    }
?>