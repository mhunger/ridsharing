<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 19/06/17
 * Time: 20:17
 */

namespace carcada\config;


use carcada\Ride;
use carcada\user\User;
use taurus\framework\api\ApiBuilder;
use taurus\framework\routing\AbstractRouteConfig;

class CarcadaRouteConfig extends AbstractRouteConfig
{
    const API_BASE_PATH = 'api';

    public function __construct($base = '', ApiBuilder $apiBuilder)
    {
        parent::__construct($base, $apiBuilder);

        $this->addDefaultRoute(
            $this->apiBuilder->cget(User::class)
        )->addDefaultRoute(
            $this->apiBuilder->cget(Ride::class)
        )->addDefaultRoute(
            $this->apiBuilder->post(Ride::class)
        )->addDefaultRoute(
            $this->apiBuilder->get(Ride::class)
        );
    }
}