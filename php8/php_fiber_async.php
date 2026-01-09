<?php

function callDB(){
    sleep(5);
    echo "Returning DB Data<br/>";
}

function callApi(){
    sleep(3);
    echo "Returning APi Data<br/>";
}

$start = time();

function getData(){
    callDB();
    callApi();
    echo "Final Result";
}

getData();

$end = time();

echo "Total time taken : ".($end - $start)." seconds";

// Fiber Example : Fibers allow cooperative multitasking, meaning you can switch between tasks manually. No Async or concurrency.
$fiber = new Fiber(function(): void {
    echo "Start<br/>";
    Fiber::suspend('Paused<br/>');
    echo "Resumed<br/>";
});

$value = $fiber->start();  // prints "Start"
echo $value ;        // prints "Paused"

$fiber->resume();           // prints "Resumed"
