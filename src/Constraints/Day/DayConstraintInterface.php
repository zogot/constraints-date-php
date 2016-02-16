<?php
namespace Clearvox\DateConstraints\Constraints\Day;

use Clearvox\DateConstraints\Constraints\ConstraintInterface;

interface DayConstraintInterface extends ConstraintInterface
{
    const MONDAY    = 1;
    const TUESDAY   = 2;
    const WEDNESDAY = 3;
    const THURSDAY  = 4;
    const FRIDAY    = 5;
    const SATURDAY  = 6;
    const SUNDAY    = 7;

    /**
     * Get the days set for this Day Constraint
     * @return integer[]
     */
    public function getDays();
}