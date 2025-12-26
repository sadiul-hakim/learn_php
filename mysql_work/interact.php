<?php

// mysqli
namespace mysql_work;
use mysqli; // import statements
use PDO;
use PDOException;

$con = new mysqli("localhost", "root", "", "learn");

if ($con->connect_error) {
    die("Could not connect to database. error" . $con->connect_error);
}

echo "Connection is successfull<br/>";

$result = $con->query("select * from student")->fetch_all();
echo "<pre>";
print_r($result);
echo "</pre>";

// PDO

try {
    $conn = new PDO("mysql:host=localhost;dbname=learn", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br/>Connection suucessful<br/>";

    $res = $conn -> query("select * from student where id > 1");
    while($row = $res -> fetch(PDO::FETCH_NUM)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
} catch (PDOException $err) {
    echo $err -> getMessage();
}
