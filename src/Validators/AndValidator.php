<?php
namespace Clearvox\DateConstraints\Validators;

use Clearvox\DateConstraints\Constraints\ConstraintInterface;
use DateTime;

class AndValidator implements ValidatorInterface
{
    /**
     * @var ConstraintInterface[]
     */
    protected $constraints = [];

    public function addConstraint(ConstraintInterface $constraint)
    {
        $this->constraints[] = $constraint;
        return $this;
    }

    /**
     * Does this exact date time match?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function validFor(DateTime $dateTime)
    {
        foreach ($this->constraints as $constraint) {
            if(!$constraint->isValid($dateTime)) {
                return false;
            }
        }

        return true;
    }
}