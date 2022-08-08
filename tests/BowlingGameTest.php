<?php

use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    public function first_game()
    {
        $bowlingGame = new BowlingGame;

        for ($i = 0; $i < 20; $i++) {
            $bowlingGame->play(1);
        }
        $this->assertEquals(20, $bowlingGame->score());
    }

    /** @test */
    public function it_awards_one_roll_bonus_for_every_spare()
    {
        $bowlingGame = new BowlingGame;
        $bowlingGame->play(4);
        $bowlingGame->play(6);


        $bowlingGame->play(6);
        for ($i = 0; $i < 17; $i++) {
            $bowlingGame->play(0);
        }
        $this->assertEquals(22, $bowlingGame->score());
    }

    /** @test */
    public function it_awards_two_roll_bonus_for_every_strike()
    {
        $bowlingGame = new BowlingGame;
        $bowlingGame->play(10);
        $bowlingGame->play(6);

        $bowlingGame->play(6);
        for ($i = 0; $i < 16; $i++) {
            $bowlingGame->play(0);
        }
        $this->assertEquals(34, $bowlingGame->score());
    }

    /** @test */
    public function a_spare_on_the_last_frame_grants_one_extra_ball()
    {
        $bowlingGame = new BowlingGame;

        for ($i = 0; $i < 18; $i++) {
            $bowlingGame->play(0);
        }

        $bowlingGame->play(5);
        $bowlingGame->play(5);

        $bowlingGame->play(5);

        $this->assertEquals(15, $bowlingGame->score());
    }
    /** @test */
    public function a_strike_on_the_last_frame_grants_two_extra_balls()
    {
        $bowlingGame = new BowlingGame;

        for ($i = 0; $i < 18; $i++) {
            $bowlingGame->play(0);
        }

        $bowlingGame->play(10);
        $bowlingGame->play(10);

        $bowlingGame->play(10);

        $this->assertEquals(30, $bowlingGame->score());
    }

        /** @test */
        public function it_scores_a_perfect_game()
        {
            $bowlingGame = new BowlingGame;
    
            for ($i = 0; $i < 12; $i++) {
                $bowlingGame->play(10);
            }
    
            $this->assertEquals(300, $bowlingGame->score());
        }
}
