<?php

$folderPath = "./static";

$fileList = scandir($folderPath);
$fileList = array_diff($fileList, array(".", ".."));

foreach($fileList as $file){
    echo "<a href='./static/$file'>$file</a>";
    echo "<br/>";
}