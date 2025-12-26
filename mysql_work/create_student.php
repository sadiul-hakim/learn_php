<?php

namespace mysql_work;

require_once("./student_service.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $s_name   = trim($_POST["name"] ?? "");
    $s_course = trim($_POST["course"] ?? "");
    $s_batch  = trim($_POST["batch"] ?? "");
    $s_city   = trim($_POST["city"] ?? "");
    $s_year   = trim($_POST["year"] ?? "");

    // No HTML or echo before header(), otherwise redirect will fail.
    if ($s_name && $s_course && $s_batch && $s_city && $s_year) {
        createStudent($s_name, $s_course, $s_batch, $s_city, $s_year);

        // ✅ Redirect after successful insert
        header("Location: student_view.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="name">Name</label><br />
            <input type="text" name="name" id="name" />
        </div><br />
        <div>
            <label for="course">Course</label><br />
            <input type="text" name="course" id="course" />
        </div><br />
        <div>
            <label for="batch">Batch</label><br />
            <input type="text" name="batch" id="batch" />
        </div><br />
        <div>
            <label for="city">City</label><br />
            <input type="text" name="city" id="city" />
        </div><br />
        <div>
            <label for="year">Year</label><br />
            <input type="text" name="year" id="year" />
        </div><br />
        <input type="submit" value="Create">
    </form>
</body>

</html>