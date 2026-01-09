<?php declare(strict_types=1);

function person(string $name, int $age, string $address = null, string $bio = null) 
{
    echo "Hello $name you are $age years old<br/>";
    if($address){
        echo "You are from $address<br/>";
    }
    if($bio){
        echo "Your bio: $bio";
    }
}

person(name:"Hakim",address:"kushtia",bio:"Developer",age:21);
