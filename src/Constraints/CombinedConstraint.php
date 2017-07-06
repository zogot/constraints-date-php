<?php // Copyright ⓒ 2017 Magneds IP B.V. - All Rights Reserved
namespace Zogo\DateConstraints\Constraints;

use DateTime;

class CombinedConstraint implements ConstraintInterface
{
    protected $constraints = [];

    public function __construct(
        ConstraintInterface... $constraints
    ) {
        $this->constraints = $constraints;
    }

    public function isValid(DateTime $dateTime)
    {
        foreach($this->constraints as $constraint) {
            if(!$constraint->isValid($dateTime)) {
                return false;
            }
        }

        return true;
    }
}
