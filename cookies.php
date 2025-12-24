<?php

// cookie is stored in browser
setcookie("app_name", "HakimSoftware", time() + (86400));



if (isset($_COOKIE['app_name'])) {
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
    echo "<br>";
}else{
    echo "No Cookie is set.";
}

session_start();
echo $_SESSION['color'];