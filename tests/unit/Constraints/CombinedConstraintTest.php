<?php

use Zogo\DateConstraints\Constraints\CombinedConstraint;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

class CombinedConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testWithOneValid()
    {
        $mockConstraint = $this->getMock(ConstraintInterface::class);
        $mockConstraint
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $combinedConstraint = new CombinedConstraint(
            $mockConstraint
        );

        $valid = $combinedConstraint->isValid(new DateTime());
        $this->assertTrue($valid);
    }

    public function testWithTwoValid()
    {
        $mockConstraint = $this->getMock(ConstraintInterface::class);
        $mockConstraint
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $mockConstraint2 = $this->getMock(ConstraintInterface::class);
        $mockConstraint2
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $combinedConstraint = new CombinedConstraint(
            $mockConstraint,
            $mockConstraint2
        );

        $valid = $combinedConstraint->isValid(new DateTime());
        $this->assertTrue($valid);
    }

    public function testWithTwoOnlyOneValid()
    {
        $mockConstraint = $this->getMock(ConstraintInterface::class);
        $mockConstraint
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $mockConstraint2 = $this->getMock(ConstraintInterface::class);
        $mockConstraint2
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(false);

        $combinedConstraint = new CombinedConstraint(
            $mockConstraint,
            $mockConstraint2
        );

        $valid = $combinedConstraint->isValid(new DateTime());
        $this->assertFalse($valid);
    }
}
