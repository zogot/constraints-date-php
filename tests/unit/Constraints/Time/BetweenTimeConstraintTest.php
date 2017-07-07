<?php

use Zogo\DateConstraints\Constraints\Day\SpecificDayConstraint;
use Zogo\DateConstraints\Constraints\Time\BetweenTimeConstraint;

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

    public function testToArray()
    {
        $array = $this->constraint->toArray();
        $this->assertArrayHasKey('times', $array);
        $this->assertArrayHasKey('after', $array['times']);
        $this->assertArrayHasKey('before', $array['times']);
    }

    public function testBuildFromArray()
    {
        $array = $this->constraint->toArray();

        $instance = BetweenTimeConstraint::buildFromArray($array);

        $this->assertEquals($array, $instance->toArray());
    }
}
