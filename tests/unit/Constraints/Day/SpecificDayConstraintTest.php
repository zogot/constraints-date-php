<?php

use Clearvox\DateConstraints\Constraints\Day\SpecificDayConstraint;

class SpecificDayConstraintTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SpecificDayConstraint
     */
    public $constraint;

    public function setUp()
    {
        $this->constraint = new SpecificDayConstraint(SpecificDayConstraint::MONDAY);
    }

    public function testIsValidWithCorrectDay()
    {
        $this->assertTrue($this->constraint->isValid(new DateTime('2016-02-15')));
    }

    public function testIsValidMultipleDaysWithCorrectDay()
    {
        $this->constraint->addDay(SpecificDayConstraint::TUESDAY);
        $this->assertTrue($this->constraint->isValid(new DateTime('2016-02-15')));
        $this->assertTrue($this->constraint->isValid(new DateTime('2016-02-16')));
    }

    public function testIsValidWithIncorrectDay()
    {
        $this->assertFalse($this->constraint->isValid(new DateTime('2016-02-16')));
    }

    public function testIsValidMultipleWithIncorrectDay()
    {
        $this->constraint->addDay(SpecificDayConstraint::TUESDAY);
        $this->assertFalse($this->constraint->isValid(new DateTime('2016-02-17')));
    }

    public function testGetDays()
    {
        $this->assertEquals([SpecificDayConstraint::MONDAY], $this->constraint->getDays());
    }
}