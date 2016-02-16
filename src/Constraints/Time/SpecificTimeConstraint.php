<?php
namespace Clearvox\DateConstraints\Constraints\Time;

use DateTime;

class SpecificTimeConstraint implements TimeConstraintInterface
{
    /**
     * @var DateTime
     */
    protected $time;

    /**
     * It must be this specific time, it will extract the H:i:s from
     * the passed in DateTime object.
     *
     * @param DateTime $dateTime
     */
    public function __construct(DateTime $dateTime)
    {
        $this->time = new DateTime($dateTime->format('H:i:s'));
    }

    /**
     * Return set times for this Time Constraint
     *
     * @return DateTime[]
     */
    public function getTimes()
    {
        return [$this->time];
    }

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime)
    {
        return $dateTime->format('H:i:s') === $this->time->format('H:i:s');
    }
}