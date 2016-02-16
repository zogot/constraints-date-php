<?php
namespace Clearvox\DateConstraints\Constraints\Day;

use DateTime;

class SpecificDayConstraint implements DayConstraintInterface
{
    protected $days = [];

    public function __construct($day)
    {
        $this->addDay($day);
    }

    public function addDay($day)
    {
        $this->days[] = $day;
        return $this;
    }

    public function isValid(DateTime $dateTime)
    {
        $submittedDay = $dateTime->format('N');

        foreach($this->days as $day) {
            if($submittedDay == $day) {
                return true;
            }
        }

        return false;
    }
}