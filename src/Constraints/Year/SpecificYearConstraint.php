<?php
namespace Clearvox\DateConstraints\Constraints\Year;

use DateTime;

class SpecificYearConstraint implements YearConstraintInterface
{
    /**
     * @var mixed[]
     */
    protected $years = [];

    public function __construct($year)
    {
        $this->addYear($year);
    }

    public function addYear($year)
    {
        $this->years[] = $year;
        return $this;
    }

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime)
    {
        return in_array($dateTime->format('Y'), $this->years);
    }
}