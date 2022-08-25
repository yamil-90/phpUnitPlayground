<?php

use App\Expression;
use PHPUnit\Framework\TestCase;

class RegularExpressionTest extends TestCase
{
    /**
     * @test
     */
    public function it_finds_a_string()
    {
        $regex = Expression::make()->find('www');

        $this->assertTrue($regex->test('www'));

        $regex = Expression::make()->then('www');

        $this->assertTrue($regex->test('www'));
    }

    /**
    * @test
    *
    * @return void
    **/
    public function it_checks_for_anything()
    {
        $regex = Expression::make()->anything();

        $this->assertTrue($regex->test('foo'));
    }

    /**
    * @test
    *
    * @return void
    **/
    public function it_checks_if_maybe_has_a_value()
    {
        $regex = Expression::make()->maybe('http');

        $this->assertTrue($regex->test('http'));

        $this->assertTrue($regex->test(''));
    }

    /**
    * @test
    *
    * @return void
    **/
    public function it_can_chain_methods_calls()
    {
        $regex = Expression::make()->find('banana')->maybe('pera')->then('manzana');
        
        $this->assertTrue($regex->test('bananaperamanzana'));
        $this->assertTrue($regex->test('bananamanzana'));
    }

    /**
    * test
    *
    * @return void
    **/
    public function it_can_exclude_values()
    {
        $regex = Expression::make()
        ->find('foo')
        ->anythingBut('bar')
        ->then('biz');

        $this->assertTrue($regex->test('foobazbiz'));

        $this->assertFalse($regex->test('foobarbiz'));
    }
}
