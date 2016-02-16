<?php
namespace Clearvox\DateConstraints\Constraints\Time;

use DateTime;

class BetweenTimeConstraint implements TimeConstraintInterface
{
    protected $after;

    protected $before;

    public function __construct(DateTime $after, DateTime $before)
    {
        $this->after  = new DateTime($after->format('H:i:s'));
        $this->before = new DateTime($before->format('H:i:s'));
    }

    public function getTimes()
    {
        return [$this->after, $this->before];
    }

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime)
    {
        $newDateTime = new DateTime($dateTime->format('H:i:s'));
        return (
            $newDateTime > $this->after &&
            $newDateTime < $this->before
        );
    }
}