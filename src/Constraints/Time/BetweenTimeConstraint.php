<?php
namespace Zogo\DateConstraints\Constraints\Time;

use DateTime;
use Zogo\DateConstraints\Constraints\ConstraintInterface;

class BetweenTimeConstraint implements TimeConstraintInterface
{
    protected $after;

    protected $before;

    public function __construct(DateTime $after, DateTime $before)
    {
        $this->after  = new DateTime($after->format('H:i:s'));
        $this->before = new DateTime($before->format('H:i:s'));
    }

    public function getTimes()
    {
        return [$this->after, $this->before];
    }

    /**
     * Is the passed in DateTime valid for this constraint?
     *
     * @param DateTime $dateTime
     * @return boolean
     */
    public function isValid(DateTime $dateTime)
    {
        $newDateTime = new DateTime($dateTime->format('H:i:s'));
        return (
            $newDateTime > $this->after &&
            $newDateTime < $this->before
        );
    }

    /**
     * Return this constraint as an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'times' => [
                'after' => $this->after->format('Y-m-d H:i:s'),
                'before' => $this->before->format('Y-m-d H:i:s'),
            ]
        ];
    }

    /**
     * Build from the toArray output.
     *
     * @param array $data
     * @return ConstraintInterface
     */
    public static function buildFromArray($data)
    {
        return new self(new DateTime($data['times']['after']), new DateTime($data['times']['before']));
    }
}
