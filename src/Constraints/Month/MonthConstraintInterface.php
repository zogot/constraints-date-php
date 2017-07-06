<?php
namespace Zogo\DateConstraints\Constraints\Month;

use Zogo\DateConstraints\Constraints\ConstraintInterface;

interface MonthConstraintInterface extends ConstraintInterface
{
    const JANUARY = 1;
    const FEBRUARY = 2;
    const MARCH = 3;
    const APRIL = 4;
    const MAY = 5;
    const JUNE = 6;
    const JULY = 7;
    const AUGUST = 8;
    const SEPTEMBER = 9;
    const OCTOBER = 10;
    const NOVEMBER = 11;
    const DECEMBER = 12;

    /**
     * Returns the integers of the chosen months for this constraint.
     *
     * @return integer[]
     */
    public function getMonths();
}
