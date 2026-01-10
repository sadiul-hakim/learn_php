<?php

// PHP does not support static inner class and method overloading
final class MathBuilder{
    private float $number;

    public function __construct(float $num)
    {
        $this -> number = $num;
    }

    public static function startInt(int $num){
        return new self((float) $num);
    }

    public static function startFloat(float $num){
        return new self($num);
    }

    public function add(float $num){
        $this -> number += $num;
        return $this;
    }

    public function minus(float $num){
        $this -> number -= $num;
        return $this;
    }
    public function multiply(float $num){
        $this -> number *= $num;
        return $this;
    }
    public function divide(float $num){
        $this -> number /= $num;
        return $this;
    }

    public function get(){
        return $this -> number;
    }
}

$res = MathBuilder::startFloat(100.00)
    -> add(200.00)
    -> divide(10.0)
    -> get();

echo $res;