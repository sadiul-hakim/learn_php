<?php

$fn = function () {
    return "result<br/>";
};

$fn2 = fn() => "result<br/>"; // arrow function

echo $fn();
echo $fn2();

function operate(int $item, Closure $callback = null): int
{
    if ($callback != null) return $callback($item);
    return $item * 2;
}

echo operate(10);
echo operate(item: 10,callback: fn (int $item): int => $item ** 2);