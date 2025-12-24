<?php

$users = [
    "name" => "Hakim",
    "age" => 21,
    "title" => "Web Developer"
];

$user_json_data = json_encode($users);
echo $user_json_data;

echo "<br/>";

$users = json_decode($user_json_data,true); // true gives you array.
print_r($users);
