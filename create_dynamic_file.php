<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Files</title>
</head>

<body>
    <fieldset>
        <legend>Make Files</legend>
        <form action="" method="post">

            <label for="fileName">File Name</label><br />
            <input type="text" name="fileName" id="fileName"><br /><br />
            <label for="content">Content</label><br />
            <textarea name="content" id="content" rows="10" cols="20"></textarea><br /><br />
            <button type="submit">Make</button>
        </form>
    </fieldset>
</body>

</html>

<?php

if (isset($_POST['fileName']) && isset($_POST['content'])) {
    $fileName = $_POST['fileName'];
    if(!str_ends_with($fileName,".txt")){
        $fileName .=".txt";
    }
    $path = './static/' . $fileName;
    $content = $_POST['content'];

    $file = fopen($path, 'w');
    fwrite($file,$content);
    fclose($file);
}

?>