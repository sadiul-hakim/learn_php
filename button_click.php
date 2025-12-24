<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="get">
        <button name="button" value="btn1">Click</button>
    </form>
    <?php

    if (isset($_GET['button'])) {
        btn_action();
    }

    function btn_action() {
        echo '<h1>Button is clicked</h1>';
    }
    ?>
</body>

</html>