<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 21/06/17
 * Time: 17:02
 */

namespace carcada\ride;

use carcada\user\User;
use taurus\framework\db\Entity;
use taurus\framework\annotation\Id;
use taurus\framework\annotation\Column;
use taurus\framework\annotation\OneToOne;


/**
 * Class Ride
 * @package carcada
 *
 * @Entity(table="ride")
 * @SWG\Definition(
 *     definition="Ride",
 *     type="object"
 * )
 *
 */
class Ride implements Entity
{

    /**
     * @var int
     * @Column(name="id")
     * @Id
     * @SWG\Property(
     *     type="int"
     * )
     */
    public $id;

    /**
     * @var
     * @Column(name="type")
     * @SWG\Property()
     */
    public $type;

    /**
     * @var string
     * @Column(name="from")
     * @SWG\Property()
     */
    public $from;

    /**
     * @var string
     * @Column(name="to")
     * @SWG\Property()
     */
    public $to;

    /**
     * @var User
     * @Column(name="id_user_offered_by")
     * @OneToOne(entity="\carcada\user\User", column="id_user_offered_by", reference_table="user", reference_table_field="id")
     * @SWG\Property(
     *     description="Person who offers the ride"
     * )
     */
    public $offeredBy;

    /**
     * @var array
     * @OneToMany(entity="\carcada\ride\RideStop", column="id", reference_table="ride_stop", foreign_key_field="id_ride")
     */
    public $stops;

    /**
     * @Column(name="travel_day")
     * @var \DateTime
     * @SWG\Property(
     *     description="The departure date and time")
     * )
     */
    public $travelDay;

    /**
     * @var \DateTime
     * @Column(name="arrival_time")
     * @SWG\Property()
     */
    public $arrivalTime;

    /**
     * @var bool
     * @Column(name="return")
     * @SWG\Property()
     */
    public $return;

    /**
     * @var bool
     * @Column(name="free_seating")
     * @SWG\Property(
     *     description="Whether seats are freely chosable or need to be reserved"
     * )
     *
     */
    public $freeSeating;

    /**
     * @var int
     * @Column(name="seats")
     * @SWG\Property()
     */
    public $seats;

    /**
     * @var float
     * @Column(name="price")
     * @SWG\Property()
     */
    public $price;

    /**
     * @var string
     * @Column(name="departure_location")
     * @SWG\Property()
     */
    public $departureLocation;

    /**
     * @var string
     * @Column(name="description")
     * @SWG\Property()
     */
    public $description;

    /**
     * @var bool
     * @Column(name="pet")
     * @SWG\Property()
     */
    public $pet;

    /**
     * @var bool
     * @Column(name="twoseats")
     * @SWG\Property()
     */
    public $twoseats;

    /**
     * @var bool
     * @Column(name="woman")
     * @SWG\Property()
     */
    public $woman;

    /**
     * @var bool
     * @Column(name="smoker")
     * @SWG\Property()
     */
    public $smoker;

    /**
     * @var string
     * @Column(name="baggage_size")
     * @SWG\Property()
     */
    public $baggageSize;

    /**
     * @var string
     * @Column(name="detour")
     * @SWG\Property()
     */
    public $detour;

    /**
     * @var bool
     * @Column(name="agb_agreed")
     * @SWG\Property()
     */
    public $agbAgreed;

    /**
     * @var bool
     * @Column(name="data_privacy_agreed")
     * @SWG\Property()
     */
    public $dataPrivacyAgreed;

    /**
     * @var bool
     * @Column(name="immediate_booking")
     * @SWG\Property()
     */
    public $immediateBooking;

    /**
     * @var string
     * @Column(name="payment")
     * @SWG\Property()
     */
    public $payment;

    /**
     * @var bool
     * @Column(name="passenger_seat_reserved")
     * @SWG\Property()
     */
    public $passengerSeatReserved;

    /**
     * @var bool
     * @Column(name="back_seat_left_reserved")
     * @SWG\Property()
     */
    public $backSeatLeftReserved;

    /**
     * @var bool
     * @Column(name="back_seat_right_reserved")
     * @SWG\Property()
     */
    public $backSeatRightReserved;

    /**
     * @var bool
     * @Column(name="back_seat_middle_reserved")
     * @SWG\Property()
     */
    public $backSeatMiddleReserved;

    /**
     * @var bool
     * @Column(name="third_row_left_reserved")
     * @SWG\Property()
     */
    public $thirdRowLeftReserved;

    /**
     * @var bool
     * @Column(name="third_row_right_reserved")
     * @SWG\Property()
     */
    public $thirdRowRightReserved;

    /**
     * @var bool
     * @Column(name="third_row_middle_reserved")
     * @SWG\Property()
     */
    public $thirdRowMiddleReserved;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getOfferedBy()
    {
        return $this->offeredBy;
    }

    /**
     * @param mixed $offeredBy
     */
    public function setOfferedBy($offeredBy)
    {
        $this->offeredBy = $offeredBy;
    }

    /**
     * @return mixed
     */
    public function getTravelDay()
    {
        return $this->travelDay;
    }

    /**
     * @param mixed $travelDay
     */
    public function setTravelDay($travelDay)
    {
        $this->travelDay = $travelDay;
    }

    /**
     * @return mixed
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param mixed $departureTime
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @param mixed $arrivalTime
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param mixed $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDepartureLocation()
    {
        return $this->departureLocation;
    }

    /**
     * @param mixed $departureLocation
     */
    public function setDepartureLocation($departureLocation)
    {
        $this->departureLocation = $departureLocation;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function getPet(): ?bool
    {
        return $this->pet;
    }

    /**
     * @param bool $pet
     */
    public function setPet(bool $pet)
    {
        $this->pet = $pet;
    }

    /**
     * @return bool
     */
    public function getTwoseats(): ?bool
    {
        return $this->twoseats;
    }

    /**
     * @param bool $twoseats
     */
    public function setTwoseats(bool $twoseats)
    {
        $this->twoseats = $twoseats;
    }

    /**
     * @return bool
     */
    public function getWoman(): ?bool
    {
        return $this->woman;
    }

    /**
     * @param bool $woman
     */
    public function setWoman(bool $woman)
    {
        $this->woman = $woman;
    }

    /**
     * @return bool
     */
    public function getSmoker(): ?bool
    {
        return $this->smoker;
    }

    /**
     * @param bool $smoker
     */
    public function setSmoker(bool $smoker)
    {
        $this->smoker = $smoker;
    }

    /**
     * @return string
     */
    public function getBaggageSize(): ?string
    {
        return $this->baggageSize;
    }

    /**
     * @param string $baggageSize
     */
    public function setBaggageSize(string $baggageSize)
    {
        $this->baggageSize = $baggageSize;
    }

    /**
     * @return string
     */
    public function getDetour(): ?string
    {
        return $this->detour;
    }

    /**
     * @param string $detour
     */
    public function setDetour(string $detour)
    {
        $this->detour = $detour;
    }

    /**
     * @return array
     */
    public function getStops(): ?array
    {
        return $this->stops;
    }

    /**
     * @param array $stops
     */
    public function setStops(array $stops)
    {
        $this->stops = $stops;
    }

    /**
     * @return bool
     */
    public function getReturn(): ?bool
    {
        return $this->return;
    }

    /**
     * @param bool $return
     */
    public function setReturn(bool $return = null)
    {
        $this->return = $return;
    }

    /**
     * @return bool
     */
    public function getFreeSeating(): ?bool
    {
        return $this->freeSeating;
    }

    /**
     * @param bool $freeSeating
     */
    public function setFreeSeating(bool $freeSeating)
    {
        $this->freeSeating = $freeSeating;
    }

    /**
     * @return bool
     */
    public function getAgbAgreed(): ?bool
    {
        return $this->agbAgreed;
    }

    /**
     * @param bool $agbAgreed
     */
    public function setAgbAgreed(bool $agbAgreed = null)
    {
        $this->agbAgreed = $agbAgreed;
    }

    /**
     * @return bool
     */
    public function getDataPrivacyAgreed(): ?bool
    {
        return $this->dataPrivacyAgreed;
    }

    /**
     * @param bool $dataPrivacyAgreed
     */
    public function setDataPrivacyAgreed(bool $dataPrivacyAgreed = null)
    {
        $this->dataPrivacyAgreed = $dataPrivacyAgreed;
    }

    /**
     * @return bool
     */
    public function getImmediateBooking(): ?bool
    {
        return $this->immediateBooking;
    }

    /**
     * @param bool $immediateBooking
     */
    public function setImmediateBooking(bool $immediateBooking = null)
    {
        $this->immediateBooking = $immediateBooking;
    }

    /**
     * @return string
     */
    public function getPayment(): string
    {
        return $this->payment;
    }

    /**
     * @param string $payment
     */
    public function setPayment(string $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return bool
     */
    public function getPassengerSeatReserved(): ?bool
    {
        return $this->passengerSeatReserved;
    }

    /**
     * @param bool $passengerSeatReserved
     */
    public function setPassengerSeatReserved(bool $passengerSeatReserved = null)
    {
        $this->passengerSeatReserved = $passengerSeatReserved;
    }

    /**
     * @return bool
     */
    public function getBackSeatLeftReserved(): ?bool
    {
        return $this->backSeatLeftReserved;
    }

    /**
     * @param bool $backSeatLeftReserved
     */
    public function setBackSeatLeftReserved(bool $backSeatLeftReserved = null)
    {
        $this->backSeatLeftReserved = $backSeatLeftReserved;
    }

    /**
     * @return bool
     */
    public function getBackSeatRightReserved(): ?bool
    {
        return $this->backSeatRightReserved;
    }

    /**
     * @param bool $backSeatRightReserved
     */
    public function setBackSeatRightReserved(bool $backSeatRightReserved = null)
    {
        $this->backSeatRightReserved = $backSeatRightReserved;
    }

    /**
     * @return bool
     */
    public function getBackSeatMiddleReserved(): ?bool
    {
        return $this->backSeatMiddleReserved;
    }

    /**
     * @param bool $backSeatMiddleReserved
     */
    public function setBackSeatMiddleReserved(bool $backSeatMiddleReserved = null)
    {
        $this->backSeatMiddleReserved = $backSeatMiddleReserved;
    }

    /**
     * @return bool
     */
    public function getThirdRowLeftReserved(): ?bool
    {
        return $this->thirdRowLeftReserved;
    }

    /**
     * @param bool $thirdRowLeftReserved
     */
    public function setThirdRowLeftReserved(bool $thirdRowLeftReserved = null)
    {
        $this->thirdRowLeftReserved = $thirdRowLeftReserved;
    }

    /**
     * @return bool
     */
    public function getThirdRowRightReserved(): ?bool
    {
        return $this->thirdRowRightReserved;
    }

    /**
     * @param bool $thirdRowRightReserved
     */
    public function setThirdRowRightReserved(bool $thirdRowRightReserved = null)
    {
        $this->thirdRowRightReserved = $thirdRowRightReserved;
    }

    /**
     * @return bool
     */
    public function getThirdRowMiddleReserved(): ?bool
    {
        return $this->thirdRowMiddleReserved;
    }

    /**
     * @param bool $thirdRowMiddleReserved
     */
    public function setThirdRowMiddleReserved(bool $thirdRowMiddleReserved = null)
    {
        $this->thirdRowMiddleReserved = $thirdRowMiddleReserved;
    }
}
