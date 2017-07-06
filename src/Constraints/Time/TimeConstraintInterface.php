<?php
namespace Zogo\DateConstraints\Constraints\Time;

use DateTime;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

interface TimeConstraintInterface extends ConstraintInterface
{
    /**
     * Return set times for this Time Constraint
     *
     * @return DateTime[]
     */
    public function getTimes();
}
