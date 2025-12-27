<?php

declare(strict_types=1);

class Printer
{
    public string $color = "red";
    private string $paper_size = "A4";
    function __invoke()
    {
        echo "Printing";
    }

    function __get(string $propertyName)
    {
        echo "property $propertyName is not found."; // If you try to access a non existing or private property, show this msg
    }

    function __set(string $propertyName, string $value)
    {
        echo "property $propertyName can not be set."; // If you try to set value a non existing or private property, show this msg

        // you can even set the value
        if (property_exists($this, $propertyName)) {
            $this->$propertyName = $value;
        }
    }

    function __call(string $methodname, array $args)
    {
        echo "method $methodname can not be called."; // If you try to call a non existing or private method, show this msg

        // you can also call the method
        if(method_exists($this,$methodname)){
            call_user_func_array([$this,$methodname],$args);
        }
    }

    private function mix_color()
    {
        echo "<br/>Mixing Color</br>";
    }
}

$p = new Printer();
// __construct()
// __destroy()
// __call()
$p-> mix_color();
// __callStatic()
// __get()
echo "<br/>";
echo $p->color;
// __set()
echo "<br/>";
$p->paper_size = "A5";
// __isset()
// __unset()
// __sleep()
// __wakeup()
// __serialize()
// __unserialize()
// __toString()
// __invoke()
$p(); // Calling instance as function
// __set_state()
// __clone()
// __debugInfo()
