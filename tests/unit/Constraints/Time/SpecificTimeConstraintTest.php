<?php

use Zogo\DateConstraints\Constraints\Time\SpecificTimeConstraint;

class SpecificTimeConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testIsValidWithCorrectTime()
    {
        $specific = new SpecificTimeConstraint(new DateTime('2015-02-10 15:00:00'));
        $this->assertTrue($specific->isValid(new DateTime('2015-02-11 15:00:00')));
    }

    public function testIsValidWithIncorrectTime()
    {
        $specific = new SpecificTimeConstraint(new DateTime('2015-02-10 15:00:00'));
        $this->assertFalse($specific->isValid(new DateTime('2015-02-11 15:01:00')));
    }

    public function testGetTimes()
    {
        $dateTime = new DateTime('2015-02-10 15:00:00');
        $specific = new SpecificTimeConstraint($dateTime);
        $this->assertEquals([new DateTime($dateTime->format('H:i:s'))], $specific->getTimes());
    }
}
