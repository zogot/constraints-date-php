<?php
namespace Clearvox\DateConstraints\Constraints\Time;

use DateTime;
use Clearvox\DateConstraints\Constraints\ConstraintInterface;

interface TimeConstraintInterface extends ConstraintInterface
{
    /**
     * Return set times for this Time Constraint
     *
     * @return DateTime[]
     */
    public function getTimes();
}