<?php declare(strict_types=1);

$users = 1;
$users_arr=[1,2,3,4,5,6,1,2,3];
$user_data = ["name"=>"Hakim","age"=>21];
var_dump(is_array($users));
echo "<br/>";
echo count($users_arr);
echo "<br/>";
unset($users_arr[2]);

print_r($users_arr);
echo "<br/>";
array_push($users_arr,10);
print_r($users_arr);
echo "<br/>";
array_pop($users_arr);
print_r($users_arr);
echo "<br/>";
print_r(array_keys($user_data));
echo "<br/>";
echo implode(",",$user_data);
echo "<br/>";
$name_arr = explode(",","Salman,Solaiman,Saad,Sadiq");
print_r($name_arr);
echo "<br/>";

print_r(array_merge($users_arr,$name_arr));
echo "<br/>";

print_r(array_unique($users_arr));
echo "<br/>";