<?php

namespace Tests\App\Fight;

use App\Entity\Weapon;
use App\Fight\DamageCalculator;
use PHPUnit\Framework\TestCase;

class DamageCalculatorTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function test_it_do_the_job($expected, Weapon $weapon, $distance)
    {
        $calculator = new DamageCalculator();

        $this->assertSame($expected, $calculator->calculate($weapon, $distance));
    }

    public static function provider()
    {
        yield [0, new Weapon('foo', 100, 1, 1), 100];
        yield [10, new Weapon('foo', 100, 1, 1), 90];
        yield [20, new Weapon('foo', 100, 1, 1), 80];
        yield [430, new Weapon('foo', 500, 0.7, 1), 100];
        yield [0, new Weapon('foo', 500, 1, 1), 100000];
    }
}
