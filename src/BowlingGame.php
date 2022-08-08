<?php

namespace App;

class BowlingGame
{
    protected array $rolls = [];

    const FRAMES_PER_GAME = 10;

    public function play(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {

            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->defaultScore($roll);
            
            if ($this->isSpare($roll)) {
                $score +=$this->spareBonus($roll);
                
            }

            $roll += 2;

            
        }
        return $score;
    }
    private function isStrike(int $roll): int
    {
        return $this->pinCount($roll) === 10;
    }

    private function isSpare(int $roll): int
    {
        return $this->defaultScore($roll) === 10;
    }

    private function strikeBonus(int $roll): int
    {
        return $this->defaultScore($roll + 1);
    }

    private function spareBonus(int $roll): int
    {
        return  $this->pinCount($roll + 2);
    }

    private function defaultScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}
