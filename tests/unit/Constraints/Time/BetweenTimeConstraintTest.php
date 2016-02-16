<?php

use Clearvox\DateConstraints\Constraints\Day\SpecificDayConstraint;
use Clearvox\DateConstraints\Constraints\Time\BetweenTimeConstraint;

class BetweenTimeConstraintTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DateTime
     */
    public $start;

    /**
     * @var DateTime
     */
    public $end;

    /**
     * @var BetweenTimeConstraint
     */
    public $constraint;

    public function setUp()
    {
        $this->start = new DateTime('09:00:00');
        $this->end   = new DateTime('17:00:00');

        $this->constraint = new BetweenTimeConstraint(
            $this->start,
            $this->end
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

    public function testGetTimes()
    {
        $this->assertEquals([$this->start, $this->end], $this->constraint->getTimes());
    }
}