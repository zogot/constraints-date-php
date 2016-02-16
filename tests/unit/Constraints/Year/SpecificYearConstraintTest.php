<?php

use Clearvox\DateConstraints\Constraints\Year\SpecificYearConstraint;

class SpecificYearConstraintTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SpecificYearConstraint
     */
    public $constraint;

    public function setUp()
    {
        $this->constraint = new SpecificYearConstraint(2015);
    }

    public function testIsValidWithValidYear()
    {
        $this->assertTrue($this->constraint->isValid(new DateTime('2015-01-01 13:00:00')));
    }

    public function testIsValidWithMoreYears()
    {
        $this->constraint
            ->addYear(2016)
            ->addYear('2017');

        $this->assertTrue($this->constraint->isValid(new DateTime('2016-01-01')));
        $this->assertTrue($this->constraint->isValid(new DateTime('2017-01-01')));
    }

    public function testIsValidWithoutValidYear()
    {
        $this->assertFalse($this->constraint->isValid(new DateTime('2016-01-01')));
    }

    public function testGetYears()
    {
        $this->assertEquals([2015], $this->constraint->getYears());
    }
}