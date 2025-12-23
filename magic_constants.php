<?php

echo __dir__;
echo "<br/>";
echo __file__;
echo "<br/>";
echo __line__;
echo "<br/>";
fun();
echo "<br/>";
echo __NAMESPACE__;
echo "<br/>";
echo __TRAIT__;
echo "<br/>";
echo Animal::class;
echo "<br/>";

function fun()
{
    echo __function__;
}

class Animal
{
    public function method()
    {
        echo __method__;
        
    }
}
