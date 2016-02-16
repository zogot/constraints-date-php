<?php
namespace Clearvox\DateConstraints\Constraints\Year;

use Clearvox\DateConstraints\Constraints\ConstraintInterface;

interface YearConstraintInterface extends ConstraintInterface
{
    /**
     * Return set years for this year constraint as an array of
     * strings/integers
     *
     * @return array
     */
    public function getYears();
}