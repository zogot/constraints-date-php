<?php
namespace Zogo\DateConstraints\Constraints\Date;

use DateTime;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

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

    /**
     * Return this constraint as an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'dates' => $this->dates,
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
        return new self($data['dates']);
    }
}
