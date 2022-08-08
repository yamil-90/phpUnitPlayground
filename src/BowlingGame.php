<?php

namespace App;

class BowlingGame
{
    public function play(int $pins)
    {
        $this->rolls[] = $pins;
    }
}