<?php

namespace App;

class Point
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function move($dx, $dy)
    {
        $this->x = $this->x + $dx;
        $this->y = $this->y + $dy;
    }
}