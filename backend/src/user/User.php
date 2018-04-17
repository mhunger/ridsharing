<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 19/06/17
 * Time: 21:24
 */

namespace carcada\user;


use taurus\framework\db\Entity;
use taurus\framework\security\AuthenticationResource;

/**
 * Class User
 * @package carcada\user
 *
 * @Entity(table="user")
 *
 * @SWG\Definition(
 *  definition="Users",
 *  type="object"
 * )
 */
class User implements Entity, AuthenticationResource
{

    const USER_TABLE_NAME = 'user';

    /**
     * @var int
     * @Id
     * @Column(name="id")
     * @SWG\Property()
     */
    public $id;

    /**
     * @var string
     *
     * @Column(name="email")
     * @SWG\Property()
     */
    public $email;

    /**
     * @var string
     * @Column(name="password")
     * @PasswordHash(algo="PASSWORD_BCRYPT", cost="12")
     * @SWG\Property()
     */
    public $password;

    /**
     * @Column(name="first_name")
     * @SWG\Property()
     */
    public $firstname;

    /**
     * @var string
     * @Column(name="last_name")
     * @SWG\Property()
     */
    public $lastname;

    /**
     * @var
     * @Column(name="img")
     * @SWG\Property()
     */
    public $img;

    /**
     * @var float
     * @Column(name="user_rating")
     * @SWG\Property()
     */
    public $userRating;


    /**
     * @var
     * @Column(name="language")
     * @SWG\Property()
     */
    public $language;


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

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return float
     */
    public function getUserRating(): float
    {
        return $this->userRating;
    }

    /**
     * @param float $userRating
     */
    public function setUserRating(float $userRating)
    {
        $this->userRating = $userRating;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }
}