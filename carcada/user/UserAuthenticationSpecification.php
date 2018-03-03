<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 03/03/18
 * Time: 16:18
 */

namespace carcada\user;


use taurus\framework\db\query\Specification;
use taurus\framework\annotation\Spec;

class UserAuthenticationSpecification implements Specification
{

    /**
     * @var string
     * @Spec(column="email", type="string")
     */
    private $email;

    /**
     * UserAuthenticationSpecification constructor.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;

    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return User::USER_TABLE_NAME;
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
}
