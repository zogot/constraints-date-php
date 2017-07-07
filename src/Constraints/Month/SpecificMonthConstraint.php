<?php
namespace Zogo\DateConstraints\Constraints\Month;

use DateTime;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

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
            if ($submittedMonth == $month) {
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
            'months' => $this->months
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
        $months = $data['months'];
        $instance = new self($months[0]);
        unset($months[0]);

        if(!empty($months)) {
            foreach($months as $month) {
                $instance->addMonth($month);
            }
        }

        return $instance;
    }
}
