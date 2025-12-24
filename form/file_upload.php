<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

if ($_FILES['file']) {
    $name = $_FILES['file']['name'];
    $upload_path = "./uploaded/" . $name;
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_path) || die("Failed to upload.");
} else{
    die("No file is uploaded");
}
