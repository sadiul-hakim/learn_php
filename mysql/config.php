<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "learn";

$dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try {

    $mysql_connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    //$mysql_connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // $mysql_connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $err) {
    echo "Failed to connect with mysql database, cause : " . $err->getMessage();
}
