<?php
namespace Clearvox\DateConstraints\Constraints\Date;

use DateTime;

class SpecificDateConstraint implements DateConstraintInterface
{
    protected $dates = [];

    public function __construct(array $dates)
    {
        $this->dates = $dates;
    }

    /**
     * Get the numerical dates set for this date constraint
     *
     * @return integer[]
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime)
    {
        return in_array($dateTime->format('j'), $this->dates);
    }
}