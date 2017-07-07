<?php

use Zogo\DateConstraints\Constraints\Date\SpecificDateConstraint;

class SpecificDateConstraintTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SpecificDateConstraint
     */
    public $constraint;

    public function setUp()
    {
        $this->constraint = new SpecificDateConstraint([
            1,
            2,
            3,
            4,
            5
        ]);
    }

    public function testIsValidWithCorrectDate()
    {
        $this->assertTrue($this->constraint->isValid(new DateTime('2016-01-05')));
    }

    public function testIsValidWithIncorrectDate()
    {
        $this->assertFalse($this->constraint->isValid(new DateTime('2016-06-10')));
    }

    public function testGetDates()
    {
        $this->assertEquals([1,2,3,4,5], $this->constraint->getDates());
    }

    public function testToArray()
    {
        $this->assertArrayHasKey('dates', $this->constraint->toArray());
    }

    public function testBuildFromArray()
    {
        $array = $this->constraint->toArray();
        $instance = SpecificDateConstraint::buildFromArray($array);
        $this->assertEquals($array, $instance->toArray());
    }
}
