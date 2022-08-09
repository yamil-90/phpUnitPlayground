<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;


class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_calculates_an_empty_string_as_0()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add("");

        $this->assertSame(0, $result);
    }

    /**
     * @test
     */
    public function it_calculates_a_number_as_the_same_number()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add('5');

        $this->assertSame(5, $result);
    }

    /**
     * @test
     */
    public function it_calculates_the_sum_of_2_numbers()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add('5,5');

        $this->assertSame(10, $result);
    }

    /**
     * @test
     */
    public function it_calculates_the_sum_of_several_numbers()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add('5,5,5,5,5');

        $this->assertSame(25, $result);
    }

    /**
     * @test
     */
    public function it_calculates_the_sum_of_numbers_divided_by_new_line()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add("5\n5");

        $this->assertSame(10, $result);
    }

    /**
     * @test
     */
    public function negatives_are_not_allowed()
    {
        $this->expectException(\Exception::class);

        $stingCalculator = new StringCalculator;

        $stingCalculator->add("-5");
    }

    /**
     * @test
     */
    public function numbers_greater_than_1000_are_ignored()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add("5\n1001");

        $this->assertSame(5, $result);
    }

    /**
     * @test
     */
    public function supports_custom_delimiters()
    {
        $stingCalculator = new StringCalculator;

        $result = $stingCalculator->add("//;\n5;1");

        $this->assertSame(6, $result);
    }
}
