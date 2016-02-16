<?php

use Clearvox\DateConstraints\Constraints\Day\SpecificDayConstraint;
use Clearvox\DateConstraints\Constraints\Time\BetweenTimeConstraint;

class BetweenTimeConstraintTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var BetweenTimeConstraint
     */
    public $constraint;

    public function setUp()
    {
        $this->constraint = new BetweenTimeConstraint(
            new DateTime('09:00:00'),
            new DateTime('17:00:00')
        );
    }

    public function testIsValidPasses()
    {
        $this->assertTrue($this->constraint->isValid(new DateTime('13:59:00')));
    }

    public function testIsValidFails()
    {
        $this->assertFalse($this->constraint->isValid(new DateTime('08:59:00')));
    }
}