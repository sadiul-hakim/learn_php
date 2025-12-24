<?php

// Session is stored in server

session_start();

$_SESSION['color'] = 'red';

echo $_SESSION['color'];

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// session_destroy();