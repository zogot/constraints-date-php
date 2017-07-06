<?php

use Zogo\DateConstraints\Constraints\Day\DayConstraintInterface;
use Zogo\DateConstraints\Constraints\Day\SpecificDayConstraint;
use Zogo\DateConstraints\Constraints\Month\MonthConstraintInterface;
use Zogo\DateConstraints\Constraints\Month\SpecificMonthConstraint;
use Zogo\DateConstraints\Constraints\Time\BetweenTimeConstraint;
use Zogo\DateConstraints\Validators\AndValidator;

class AndValidatorIntegrationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var AndValidator
     */
    public $validator;

    public function setUp()
    {
        $this->validator = new AndValidator();
    }

    public function testExample1FromReadme()
    {
        $this->validator
            ->addConstraint(new SpecificDayConstraint(DayConstraintInterface::TUESDAY))
            ->addConstraint(new SpecificMonthConstraint(MonthConstraintInterface::FEBRUARY));

        $this->assertTrue($this->validator->validFor(new DateTime('Tuesday, 16 Feb 2016 13:00:00 GMT')));
        $this->assertFalse($this->validator->validFor(new DateTime('Monday, 15 Feb 2016 13:00:00 GMT')));
    }

    public function testExample2FromReadme()
    {
        $this->validator
            ->addConstraint(new BetweenTimeConstraint(new DateTime('09:00:00'), new DateTime('17:00:00')));

        $this->assertTrue($this->validator->validFor(new DateTime('Tuesday, 16 Feb 2016 13:00:00 GMT')));
        $this->assertFalse($this->validator->validFor(new DateTime('Tuesday, 16 Feb 2016 18:00:00 GMT')));
    }
}
