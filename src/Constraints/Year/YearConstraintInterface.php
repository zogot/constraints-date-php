<?php
namespace Zogo\DateConstraints\Constraints\Year;

use Zogo\DateConstraints\Constraints\ConstraintInterface;

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
