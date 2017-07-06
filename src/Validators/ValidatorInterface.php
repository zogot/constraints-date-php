<?php
namespace Zogo\DateConstraints\Validators;

use DateTime;

interface ValidatorInterface
{
    /**
     * Does this exact date time match?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function validFor(DateTime $dateTime);
}
