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
}