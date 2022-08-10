<?php

namespace App;

class TennisMatch
{
    protected Player $playerOne;

    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function pointToPlayerOne()
    {
        $this->playerOne->score();
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwo->score();
    }

    public function score()
    {
        if ($this->hasWinner()) {
            return 'winner! ' . $this->leader();
        }

        if ($this->hasAdvantage()) {
            return 'advantage, ' . $this->leader();
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->playerOne->translatePoints(),
            $this->playerTwo->translatePoints(),
        );
    }

    public function hasWinner()
    {
        if ($this->playerOne->points > 3 && $this->playerOne->points >= $this->playerTwo->points + 2) {
            return true;
        }

        if ($this->playerTwo->points > 3 && $this->playerTwo->points >= $this->playerOne->points + 2) {
            return true;
        }

        return false;
    }

    public function leader()
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne->name : $this->playerTwo->name;
    }

    public function hasEnoughtPoints()
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3 ? true : false;
    }

    public function isDeuce()
    {
        return $this->hasEnoughtPoints() && $this->playerOne->points === $this->playerTwo->points;
    }

    public function hasAdvantage()
    {
        if($this->hasEnoughtPoints()) {
            return !$this->isDeuce();
        }
        
        return false;
    }

}
