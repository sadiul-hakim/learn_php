<?php
require_once("./student_service.php");

$sId = $_GET['sId'];
if (isset($sId)) {
    $student = getStudent($sId);
    if (!$student) {
        exit("Student is not found with id " . $sId);
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
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>" />
        <div>
            <label for="name">Name</label><br />
            <input type="text" name="name" id="name"
                value="<?php echo $student['name']; ?>" />
        </div><br />
        <div>
            <label for="course">Course</label><br />
            <input type="text" name="course" id="course"
                value="<?php echo $student['course']; ?>" />
        </div><br />
        <div>
            <label for="batch">Batch</label><br />
            <input type="text" name="batch" id="batch"
                value="<?php echo $student['batch']; ?>" />
        </div><br />
        <div>
            <label for="city">City</label><br />
            <input type="text" name="city" id="city"
                value="<?php echo $student['city']; ?>" />
        </div><br />
        <div>
            <label for="year">Year</label><br />
            <input type="text" name="year" id="year"
                value="<?php echo $student['year']; ?>" />
        </div><br />
        <input type="submit" value="Update">
    </form>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $s_id   = trim($_POST["id"] ?? "");
    $s_name   = trim($_POST["name"] ?? "");
    $s_course = trim($_POST["course"] ?? "");
    $s_batch  = trim($_POST["batch"] ?? "");
    $s_city   = trim($_POST["city"] ?? "");
    $s_year   = trim($_POST["year"] ?? "");

    // No HTML or echo before header(), otherwise redirect will fail.
    if ($s_name && $s_course && $s_batch && $s_city && $s_year) {
        updateStudent($s_id, $s_name, $s_course, $s_batch, $s_city, $s_year);

        // Redirect after successful insert
        header("Location: student_view.php");
        exit;
    }
}
?>