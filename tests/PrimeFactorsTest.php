<?php


use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{

	/** 
	 * @test 
	 * @dataProvider check_factors
	 */
	public function it_generates_prime_factors_for_1($number, $result)
	{
		$factors = new PrimeFactors;

		$this->assertEquals($result, $factors->generate($number));
	}

	public function check_factors()
	{
		return [
			[1, []],
			[2, [2]],
			[3, [3]],
			[4, [2, 2]],
			[5, [5]],
			[6, [2, 3]],
			[100, [2, 2, 5, 5]]
		];
	}
}
