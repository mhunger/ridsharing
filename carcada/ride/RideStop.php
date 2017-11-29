<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 29/11/17
 * Time: 21:14
 */

namespace carcada\ride;


use taurus\framework\db\Entity;

/**
 * Class RideStop
 * @package carcada\ride
 *
 * @Entity(table="ride_stop")
 */
class RideStop implements Entity
{

    /**
     * @var int
     * @Id
     * @Column(name="id")
     */
    public $id;

    /**
     * @var int
     * @Column(name="id_ride")
     */
    public $rideId;

    /**
     * @var string
     * @Column(name="stop_name")
     */
    public $stopName;

    /**
     * @return int
     */
    public function getRideId(): ?int
    {
        return $this->rideId;
    }

    /**
     * @return string
     */
    public function getStopName(): ?string
    {
        return $this->stopName;
    }

    /**
     * @param int $rideId
     */
    public function setRideId(int $rideId)
    {
        $this->rideId = $rideId;
    }

    /**
     * @param string $stopName
     */
    public function setStopName(string $stopName)
    {
        $this->stopName = $stopName;
    }

    /**
     * @return int
     */
    public function getId(): ?int
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


}