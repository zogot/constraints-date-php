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

    public function testToArray()
    {
        $mockArray = ['values' => ['random1', 'random2', 'random3']];
        $mockConstraint = $this->getMock(ConstraintInterface::class);
        $mockConstraint
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($mockArray);

        $combinedConstraint = new CombinedConstraint(
            $mockConstraint
        );

        $expected = [
            'constraints' => [
                [
                    'fqdn' => get_class($mockConstraint),
                    'data' => $mockArray,
                ]
            ],
        ];
        $array = $combinedConstraint->toArray();
        $this->assertEquals($expected, $array);
    }
}
