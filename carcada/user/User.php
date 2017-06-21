<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 19/06/17
 * Time: 21:24
 */

namespace carcada\user;


use taurus\framework\db\Entity;

/**
 * Class User
 * @package carcada\user
 *
 * @Entity(table="user")
 */
class User implements Entity
{
    /**
     * @var int
     * @Id
     * @Column(name="id")
     */
    public $id;

    /**
     * @var string
     * @Column(name="email")
     *
     */
    public $email;

    /**
     * @var string
     * @Column(name="password")
     */
    public $password;

    /**
     * @Column(name="first_name")
     */
    public $firstname;

    /**
     * @var string
     * @Column(name="last_name")
     */
    public $lastname;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }
}