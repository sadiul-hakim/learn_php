<?php
//include("./util.php"); // include just includes the file, does not check if the file is already included or not.
//include_once("./util1.php"); // Does not matter how many times we include the file(call include function), it would be included once.
// include or include_once does not throw fatal_error if file does not exists.

//require("./util.php"); // Does the same thing as include but checks if file exists. If not, throw fatal_error
require_once("./util.php"); // requires file once and makes sure file exists.

echo sum(1,2,3,4);