<?php

declare(strict_types=1);

require_once("./config.php");

$findAllQuery = $mysql_connection->prepare("select * from student");
$createQuery = $mysql_connection->prepare(
    "insert into student (name,course,batch,city,`year`) 
    values (:name,:course,:batch,:city,:year);"
);

function findAllStudent(): array
{
    global $findAllQuery;
    $findAllQuery->execute();
    return $findAllQuery->fetchAll();
}

function createStudent(
    string $name,
    string $course,
    string $batch,
    string $city,
    string $year,
    ):void{

    global $createQuery;
    $createQuery -> execute([
        ':name'=>$name,
        ':course'=>$course,
        ':batch'=>$batch,
        ':city'=>$city,
        ':year'=>$year,
    ]);
}