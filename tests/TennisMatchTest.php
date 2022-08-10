<?php

use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;


class TennisMatchTest extends TestCase
{

    /**
     *  @test
     *  @dataProvider scoresProvider
     */
    public function is_scores_1_to_0(int $playerOnePoints, int $playerTwoPoints, string $score)
    {
        $match = new TennisMatch(
            $john = new Player('John'),

            $jane = new Player('Jane')
        );

        for($i=0; $i < $playerOnePoints; $i++){
            $john->score();
        }

        for($i=0; $i < $playerTwoPoints; $i++){
            $jane->score();
        }

        $this->assertEquals($score, $match->score());
    }

    public function scoresProvider()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [1, 1, 'fifteen-fifteen'],
            [4, 0, 'winner! John'],
            [4, 3, 'advantage, John'],
            [3, 4, 'advantage, Jane'],
            [5, 6, 'advantage, Jane'],
            [14, 13, 'advantage, John'],
            [0, 4, 'winner! Jane']
        ];
    }
    
}
