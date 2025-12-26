<?php

namespace mysql_work;
require_once("./student_service.php");
require_once("./Student.php");

if(isset($_GET['sId'])){
    deleteStudent($_GET['sId']);
}

$s = getStudentModel(6);
echo "<pre>";
print_r($s);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <style>
        table,tr,th,td{
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <a href="./create_student.php">Create Student</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Course</th>
                <th>Batch</th>
                <th>City</th>
                <th>Year</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $students = findAllStudent();
                foreach($students as $s){
                    echo "<tr>";
                    echo "<td>"; echo $s['id']; echo "</td>";
                    echo "<td>"; echo $s['name']; echo "</td>";
                    echo "<td>"; echo $s['course']; echo "</td>";
                    echo "<td>"; echo $s['batch']; echo "</td>";
                    echo "<td>"; echo $s['city']; echo "</td>";
                    echo "<td>"; echo $s['year']; echo "</td>";
                    echo "<td>"; 
                    echo "<a href=./edit_student.php?sId=".$s['id'].">edit,"."</a>";
                    echo "<a href=?sId=".$s['id'].">Delete"."</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>