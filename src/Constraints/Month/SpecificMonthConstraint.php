<?php
namespace Zogo\DateConstraints\Constraints\Month;

use DateTime;

class SpecificMonthConstraint implements MonthConstraintInterface
{
    /**
     * @var array
     */
    protected $months = [];

    public function __construct($month)
    {
        $this->addMonth($month);
    }

    /**
     * Add another month to this specific month selector
     *
     * @param int $month
     * @return $this
     */
    public function addMonth($month)
    {
        $this->months[] = $month;
        return $this;
    }

    /**
     * Returns the integers of the chosen months for this constraint.
     *
     * @return integer[]
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime)
    {
        $submittedMonth = $dateTime->format('n');

        foreach ($this->months as $month) {
            if($submittedMonth == $month) {
                return true;
            }
        }

        return false;
    }
}
