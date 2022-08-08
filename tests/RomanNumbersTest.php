<?php

use App\RomanNumbers;
use PHPUnit\Framework\TestCase;

class RomanNumbersTest extends TestCase
{
	/**
	 * @test 
	 * @dataProvider checks
	 */
	public function it_generates_roman_numeral($variable, $result)
	{
		$this->assertEquals($result, RomanNumbers::transformIntoRoman($variable));
	}

	/**
	 * @test 
	 */
	public function cannot_generate_roman_numeral_for_0()
	{
		$this->assertFalse(RomanNumbers::transformIntoRoman(0));
	}
 
	public function checks()
	{
		return [
			[1, 'I'],
			[2, 'II'],
			[3, 'III'],
            [5, 'V'],
            [10, 'X'],
            [39, 'XXXIX'],
            [100, 'C'],
            [3871, 'MMMDCCCLXXI'],
            [3999, 'MMMCMXCIX']
		];
	}
}