<?php

namespace App;

class Player
{
    public $points = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points ++;
    }

    public function translatePoints()
    {
        switch ($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';

            default:
                return 'error';
        }
    }
}