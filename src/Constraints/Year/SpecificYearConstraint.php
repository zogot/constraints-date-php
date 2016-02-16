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
     * Return set years for this year constraint as an array of
     * strings/integers
     *
     * @return array
     */
    public function getYears()
    {
        return $this->years;
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