<?php
namespace Zogo\DateConstraints\Constraints\Year;

use DateTime;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

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

    /**
     * Return this constraint as an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'years' => $this->years
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
        $years = $data['years'];
        $instance = new self($years[0]);
        unset($years[0]);

        if(!empty($years)) {
            foreach($years as $year) {
                $instance->addYear($year);
            }
        }

        return $instance;
    }
}
