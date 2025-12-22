<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>With html</title>
</head>
<body>
    <?php
        echo "<h1>This is heading one.</h1>";
        $name = "Hakim";
        $color="red";
    ?>
    <span style='color:<?php echo $color ?>'>echo "My name is $name";</span>
</body>
</html>