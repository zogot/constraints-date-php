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

    public function getConstraints()
    {
        return $this->constraints;
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

    /**
     * Return this constraint as an array
     *
     * @return array
     */
    public function toArray()
    {
        $constraints = [];
        foreach($this->constraints as $constraint) {
            $constraints[] = [
                'fqdn' => get_class($constraint),
                'data' => $constraint->toArray(),
            ];
        }

        return ['constraints' => $constraints];
    }

    /**
     * Build from the toArray output.
     *
     * @param array $data
     * @return ConstraintInterface
     */
    public static function buildFromArray($data)
    {
        $constraints = [];
        foreach($data['constraints'] as $constraint) {
            $class = $constraint['fqdn'];
            $constraints[] = $class::buildFromArray($constraint['data']);
        }

        return new self(...$constraints);
    }
}
