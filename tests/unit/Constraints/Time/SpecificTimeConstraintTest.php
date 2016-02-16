<?php

use Clearvox\DateConstraints\Constraints\Time\SpecificTimeConstraint;

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
}