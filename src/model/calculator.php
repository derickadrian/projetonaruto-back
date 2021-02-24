<?php
namespace App\Model;

class Calculator
{
    private $number1;
    private $number2;

    public function __construct() {}
    public function __destruct() {}

    public function __get($atribute)
    {
      return $this->$atribute;
    }

    public function __set($atribute, $value)
    {
      $this->$atribute = $value;
    }

    public function sum(): float
    {
      return $this->number1 + $this->number2;
    }

    public function __toString(): string
    {
      return $this->number1 ." + ". $this->number2 . " = " . $this->sum();
    }
}
