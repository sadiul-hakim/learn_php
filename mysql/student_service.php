<?php

declare(strict_types=1);

require_once("./config.php");

$findAllQuery = $mysql_connection->prepare("select * from student");
$findStudentQuery = $mysql_connection->prepare("select * from student where id = :id");
$getStudentDropdownQuery = $mysql_connection->prepare("select id,name from student");
$deleteStudentQuery = $mysql_connection->prepare("delete from student where id = :id");
$createQuery = $mysql_connection->prepare(
    "insert into student (name,course,batch,city,`year`) 
    values (:name,:course,:batch,:city,:year);"
);

$updateQuery = $mysql_connection->prepare(
    "UPDATE student
     SET name = :name,
         course = :course,
         batch = :batch,
         city = :city,
         `year` = :year
     WHERE id = :id"
);

function getStudent(int $sId): mixed
{
    global $findStudentQuery;
    $findStudentQuery->execute([
        ':id' => $sId
    ]);
    return $findStudentQuery->fetch();
}

function findAllStudent(): array
{
    global $findAllQuery;
    $findAllQuery->execute();
    return $findAllQuery->fetchAll();
}

function getStudentDropdown(): array
{
    global $getStudentDropdownQuery;
    $getStudentDropdownQuery->execute();
    return $getStudentDropdownQuery->fetchAll();
}

function createStudent(
    string $name,
    string $course,
    string $batch,
    string $city,
    string $year,
): void {

    global $createQuery;
    $createQuery->execute([
        ':name' => $name,
        ':course' => $course,
        ':batch' => $batch,
        ':city' => $city,
        ':year' => $year,
    ]);
}

function updateStudent(
    int $id,
    string $name,
    string $course,
    string $batch,
    string $city,
    string $year,
): void {

    global $updateQuery;
    $updateQuery->execute([
        ':name' => $name,
        ':course' => $course,
        ':batch' => $batch,
        ':city' => $city,
        ':year' => $year,
        ':id' => $id
    ]);
}

function deleteStudent(int $sId): void
{
    global $deleteStudentQuery;
    $deleteStudentQuery->execute([
        ':id' => $sId
    ]);
}
