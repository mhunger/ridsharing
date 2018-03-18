<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 04/03/18
 * Time: 11:52
 */

namespace carcada\ride;


use taurus\framework\db\query\Specification;

class RideFilterSpecification implements Specification
{

    /**
     * @var string
     * @Spec(column="from", filterType="like", argumentType="string")
     */
    private $from;

    /**
     * @var string
     */
    private $fromRadius;

    /**
     * @var string
     * @Spec(column="to", filterType="like", argumentType="string")
     */
    private $to;

    /** @var string */
    private $toRadius;

    /**
     * @var string
     * @Spec(column="travel_day", filterType="like", argumentType="string")
     */
    private $travelDay;

    /** @var string */
    private $rideType;

    /** @var string */
    private $price;

    /** @var bool */
    private $freeSeating;

    /** @var bool */
    private $seats;

    /** @var bool */
    private $womenOnly;

    /** @var bool */
    private $pets;

    /** @var string */
    private $baggageSize;

    /** @var bool */
    private $immediateBooking;

    /** @var string */
    private $payment;

    /**
     * RideFilterSpecification constructor.
     * @param string $from
     * @param null|string $to
     * @param null|string $travelDay
     */
    public function __construct(
        string $from = null,
        string $to = null,
        string $travelDay = null
    ) {
        $this->from = $from;
        $this->to = $to;
        $this->travelDay = $travelDay;
    }


    public function getTable(): string
    {
        return Ride::RIDE_TABLE;
    }

    /**
     * @return null|string
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo(): ?string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getTravelDay(): ?string
    {
        return $this->travelDay;
    }
}
