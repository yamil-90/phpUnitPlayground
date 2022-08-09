<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimiter = ",|\n";

    public function add(string $numbers)
    {
        $numbers = $this->parseString($numbers);

        $this->checkNegatives($numbers);

        $numbers = $this->ignoreGreaterThanMaxAllowed($numbers);

        return array_sum($numbers);
    }

    public function checkNegatives(array $numbers): StringCalculator
    {
        foreach ($numbers as $number) {
            if ((int)$number < 0) {
                throw new Exception("negative numbers like {$number} are not allowed");
            }
        }
        return $this;
    }

    public function ignoreGreaterThanMaxAllowed(array $numbers)
    {
        return array_filter($numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }

    protected function parseString(string $numbers)
    {
        $customDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }
}
