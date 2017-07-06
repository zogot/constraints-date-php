<?php
namespace Zogo\DateConstraints\Constraints\Date;

use Zogo\DateConstraints\Constraints\ConstraintInterface;

interface DateConstraintInterface extends ConstraintInterface
{
    /**
     * Get the numerical dates set for this date constraint
     *
     * @return integer[]
     */
    public function getDates();
}
