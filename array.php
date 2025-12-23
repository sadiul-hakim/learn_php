<?php

// Collection of Data
// PHP array can conatin data of different types in a single array

$arr = [1, 2, 3, true, "Hi"];

// Index Array
$users = ["Hakim", "Ashik", "None", "Rakib"];
$users2 = array("Hakim", "Ashik", "Rakib");
echo $users[1];
echo "<br/>";

// loop
for ($i = 0; $i < count($users); $i++) {
    echo $users[$i];
    echo "<br/>";
}
// Associative Array (Kinda Map, key value pair)
$userDetails = [
    "name" => "Hakim",
    "age" => 21,
    "language" => ["Java", "JS", "PHP"],
    "title" => "Web Developer",
    "city" => "Kushtia"
];
echo "<br/>";

foreach ($userDetails as $key => $data) {
    if (is_array($data)) {
        echo $key . ": ";
        foreach ($data as $d) :
            echo $d;
            echo ", ";
        endforeach;
        echo "<br/>";
        continue;
    }

    echo $key . ":" . $data . "<br/>";
}

// Multidimensional Array


// ForEach loop
// 1. 
echo "------------------------------<br/>";
foreach ($users as $u) {

    if ($u === "None") {
        continue;
    }
    echo $u . "<br/>";
}
// 2.
echo "------------------------------<br/>";
foreach ($users as $u) :

    if ($u === "None") {
        continue;
    }
    echo $u . "<br/>";
endforeach;
