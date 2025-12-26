<?php
    namespace mysql_work;
    require_once("./student_service.php");
    $studentsDropdown = getStudentDropdown();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dropdown</title>
</head>
<body>
    <select name="student" id="student">
        <?php
            foreach($studentsDropdown as $student){
                echo "<option value=".$student['id'].">".$student['name']."</option>";
            }
        ?>
    </select>
</body>
</html>