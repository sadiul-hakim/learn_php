<?php

$name = "Riaz";

$message = match($name){
    'Hakim'=>'JS => TS => Solidity => Java => PHP',
    'Ashik'=>'PHP => Cyber Security',
    'Rakib'=>'PHP to Python',
    'Mustak','Riaz'=>'Failed'
};

echo $message;