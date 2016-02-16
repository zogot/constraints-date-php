<?php

use Clearvox\DateConstraints\Constraints\Date\SpecificDateConstraint;

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
}