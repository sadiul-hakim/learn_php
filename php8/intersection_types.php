<?php

function process((Countable & Iterator) | string $input){
    if(is_string($input)){
        echo $input;
    } else{
        echo $input -> count();
    }
}
