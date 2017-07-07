<?php
namespace Zogo\DateConstraints\Constraints;

use DateTime;

interface ConstraintInterface
{
    /**
     * Return this constraint as an array
     *
     * @return array
     */
    public function toArray();

    /**
     * Build from the toArray output.
     *
     * @param array $data
     * @return ConstraintInterface
     */
    public static function buildFromArray($data);

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime);
}
