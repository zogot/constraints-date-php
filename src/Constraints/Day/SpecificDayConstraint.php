<?php
namespace Zogo\DateConstraints\Constraints\Day;

use DateTime;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

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

    /**
     * Get the days set for this Day Constraint
     * @return integer[]
     */
    public function getDays()
    {
        return $this->days;
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

    /**
     * Return this constraint as an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'days' => $this->days,
        ];
    }

    /**
     * Build from the toArray output.
     *
     * @param array $data
     * @return ConstraintInterface
     */
    public static function buildFromArray($data)
    {
        $days = $data['days'];
        $instance = new self($data['days'][0]);
        unset($days[0]);

        if(!empty($days)) {
            foreach($days as $day) {
                $instance->addDay($day);
            }
        }

        return $instance;
    }
}
