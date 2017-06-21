<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 21/06/17
 * Time: 17:02
 */

namespace carcada;

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
 */
class Ride implements Entity
{

    /**
     * @var int
     * @Column(name="id")
     * @Id
     */
    public $id;

    /**
     * @var string
     * @Column(name="from")
     */
    public $from;

    /**
     * @var string
     * @Column(name="to")
     */
    public $to;

    /**
     * @var User
     * @Column(name="id_user_offered_by")
     * @OneToOne(entity="\carcada\user\User", column="id_user_offered_by", reference_table="user", reference_key_field="id")
     */
    public $offeredBy;

    /**
     * @var \DateTime
     * @Column(name="travel_day")
     */
    public $travelDay;

    /**
     * @var \DateTime
     * @Column(name="departure_time")
     */
    public $departureTime;

    /**
     * @var \DateTime
     * @Column(name="arrival_time")
     */
    public $arrivalTime;

    /**
     * @var int
     * @Column(name="seats")
     */
    public $seats;

    /**
     * @var float
     * @Column(name="price")
     */
    public $price;

    /**
     * @var string
     * @Column(name="departure_location")
     */
    public $departureLocation;

    /**
     * @var string
     * @Column(name="description")
     */
    public $description;

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
    public function getDescription(): string
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
}