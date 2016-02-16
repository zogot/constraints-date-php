<?php
namespace Clearvox\DateConstraints\Constraints\Day;

use Clearvox\DateConstraints\Constraints\ConstraintInterface;

interface DayConstraintInterface extends ConstraintInterface
{
    const SUNDAY    = 0;
    const MONDAY    = 1;
    const TUESDAY   = 2;
    const WEDNESDAY = 3;
    const THURSDAY  = 4;
    const FRIDAY    = 5;
    const SATURDAY  = 6;
}