<?php

namespace Tests;

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     *
     */
    public function ir_returns_the_correct_string($number, $expectedResult)
    {
        $this->assertEquals($expectedResult, FizzBuzz::convert($number));
    }

    protected function dataProvider()
    {
        return [
            [3, 'Fizz'],
            [5, 'Buzz'],
            [15, 'FizzBuzz'],
            [2, 2]
        ];
    }
}
