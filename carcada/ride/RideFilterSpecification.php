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

    /** @var string */
    private $fromRadius;

    /** @var string */
    private $to;

    /** @var string */
    private $toRadius;

    /** @var string */
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
     * @param $from
     * @param $fromRadius
     * @param $to
     * @param $toRadius
     * @param $travelDay
     * @param $rideType
     * @param $price
     * @param $freeSeating
     * @param $seats
     * @param $womenOnly
     * @param $pets
     * @param $baggageSize
     * @param $immediateBooking
     * @param $payment
     */
    public function __construct(
        $from = null/*,
        $fromRadius = null,
        $to = null,
        $toRadius = null,
        $travelDay = null,
        $rideType = null,
        $price = null,
        $freeSeating = null,
        $seats = null,
        $womenOnly = null,
        $pets = null,
        $baggageSize = null,
        $immediateBooking = null,
        $payment = null*/
    ) {
        $this->from = $from;
/*        $this->fromRadius = $fromRadius;
        $this->to = $to;
        $this->toRadius = $toRadius;
        $this->travelDay = $travelDay;
        $this->rideType = $rideType;
        $this->price = $price;
        $this->freeSeating = $freeSeating;
        $this->seats = $seats;
        $this->womenOnly = $womenOnly;
        $this->pets = $pets;
        $this->baggageSize = $baggageSize;
        $this->immediateBooking = $immediateBooking;
        $this->payment = $payment;*/
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
}
