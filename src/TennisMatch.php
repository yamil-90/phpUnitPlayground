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

    public function score()
    {
        if ($this->hasWinner()) {
            return 'winner! ' . $this->leader()->name;
        }

        if ($this->hasAdvantage()) {
            return 'advantage, ' . $this->leader()->name;
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
        // if ($this->playerOne->points < 4 || $this->playerTwo->points < 4) {
        //     return false;
        // }

        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }

        return abs($this->playerOne->points - $this->playerTwo->points) > 2;
    }

    public function leader()
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
    }

    public function isDeuce()
    {
        return $this->hasEnoughtPoints() && $this->playerOne->points === $this->playerTwo->points;
    }

    public function hasAdvantage()
    {
        if ($this->hasEnoughtPoints()) {
            return !$this->isDeuce();
        }

        return false;
    }

    public function hasEnoughtPoints()
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3 ? true : false;
    }
}
