<?php
namespace Tests\Unit;
require_once ('app/Helper.php');
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_calc_a_numbers()
    {
        $calc = calc(10,10);
        $this->assertEquals(20 , $calc);
    }
}
