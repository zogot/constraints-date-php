<?php

use Clearvox\DateConstraints\Constraints\ConstraintInterface;
use Clearvox\DateConstraints\Validators\AndValidator;

class AndValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var AndValidator
     */
    protected $validator;

    public function setUp()
    {
        $this->validator = new AndValidator();
    }

    public function testValidForPassesWith1ValidConstraint()
    {
        $mock = $this->getMockBuilder(ConstraintInterface::class)
            ->getMock();

        $mock
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $this->validator->addConstraint($mock);

        $this->assertTrue($this->validator->validFor(new DateTime()));
    }

    public function testValidForPassesWith2Constraints()
    {
        $first = $this->getMockBuilder(ConstraintInterface::class)
            ->getMock();

        $first
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $second = $this->getMockBuilder(ConstraintInterface::class)
            ->getMock();

        $second
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $this->validator
            ->addConstraint($first)
            ->addConstraint($second);

        $this->assertTrue($this->validator->validFor(new DateTime()));
    }

    public function testValidForFailsWith2Constraints1Valid()
    {
        $validMock = $this->getMockBuilder(ConstraintInterface::class)
            ->getMock();

        $validMock
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $invalidMock = $this->getMockBuilder(ConstraintInterface::class)
            ->getMock();

        $invalidMock
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(false);

        $this->validator
            ->addConstraint($validMock)
            ->addConstraint($invalidMock);

        $this->assertFalse($this->validator->validFor(new DateTime()));
    }
}