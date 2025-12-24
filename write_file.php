<?php

$fileName = "./static/text.txt";

$content = "Hi";

$file = fopen($fileName,"w") or die("Could not open file");

fwrite($file,$content);
fclose($file);

//-----------------------------

// Open the file in read mode
$rFile = fopen($fileName, "r");

if ($rFile) {
    // Get the file size
    $fileSize = filesize($fileName);
    
    // Read the entire file
    $fContent = fread($rFile, $fileSize);
    
    // Output the content
    echo $fContent;
    
    // Close the file
    fclose($rFile);
} else {
    echo "Failed to open file.";
}