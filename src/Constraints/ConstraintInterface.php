<?php
namespace Zogo\DateConstraints\Constraints;

use DateTime;

interface ConstraintInterface
{
    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime);
}
