<?php

use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    public function first_game()
    {
        $this->assertEquals(0 , BowlingGame::play(0));
    }
    
}