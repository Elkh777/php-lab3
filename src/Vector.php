<?php

namespace App;

class Vector
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function length()
    {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    public function isZero()
    {
        return $this->x == 0 && $this->y == 0;
    }

    public function isPerpendicular($other)
    {
        $product = $this->x * $other->x + $this->y * $other->y;

        return abs($product) < 0.000001;
    }
}