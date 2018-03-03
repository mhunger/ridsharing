<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 19/06/17
 * Time: 20:17
 */

namespace carcada\config;


use carcada\ride\Ride;
use carcada\user\Car;
use carcada\user\User;
use taurus\framework\api\ApiBuilder;
use taurus\framework\routing\AbstractRouteConfig;
use taurus\framework\routing\Request;

class CarcadaRouteConfig extends AbstractRouteConfig
{
    const API_BASE_PATH = 'api';

    public function __construct($base = '', ApiBuilder $apiBuilder)
    {
        parent::__construct($base, $apiBuilder);

        /**
         * @SWG\Get(
         *     path="/users",
         *     operationId="getUser",
         *     description="Gets all users",
         *     produces={"application/json"},
         *     @SWG\Response(
         *         response=200,
         *         description="ride list",
         *         @SWG\Schema(ref="#/definitions/User")
         *     )
         * )
         */
        $this->addDefaultRoute(
            $this->apiBuilder->cget(User::class)
        )
        /**
         * @SWG\Get(
         *     path="/rides",
         *     operationId="getRideList",
         *     description="Gets all rides",
         *     produces={"application/json"},
         *     @SWG\Response(
         *         response=200,
         *         description="ride list",
         *         @SWG\Schema(ref="#/definitions/Ride")
         *     )
         * )
         */
        ->addDefaultRoute(
            $this->apiBuilder->cget(Ride::class)
        )/**
         * @SWG\Post(
         *     path="/rides",
         *     operationId="postRide",
         *     description="Creates a new Ride",
         *     produces={"application/json"},
         *     consumes={"application/json"},
         *     @SWG\Parameter(
         *         name="body",
         *         in="body",
         *         description="Pet object that needs to be added to the store",
         *         required=true,
         *         @SWG\Schema(ref="#/definitions/Ride"),
         *     @SWG\Response(
         *         response=201,
         *         description="Ride Created",
         *         @SWG\Schema(ref="#/definitions/Ride")
         *     )
         * )
         */
        ->addDefaultRoute(
            $this->apiBuilder->post(Ride::class)
        )->addDefaultRoute(
            $this->apiBuilder->get(Ride::class)
        )->addDefaultRoute(
            $this->apiBuilder->cget(Car::class))
        ->addDefaultRoute(
            $this->apiBuilder->buildAuthenticationRoute(Request::HTTP_POST, '/user/login')
        );

    }
}