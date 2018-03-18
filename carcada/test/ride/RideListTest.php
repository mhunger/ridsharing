<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 12/11/17
 * Time: 18:00
 */

namespace carcada\test;


use taurus\framework\config\TaurusContainerConfig;
use taurus\framework\Container;
use taurus\framework\mock\MockServer;

class RideListTest extends AbstractCarcadaDatabaseTest
{
    function getFixtureFiles(): array
    {
        return [
            'rides.xml',
            'ride_stop.xml',
            'users.xml'
        ];
    }

    public function testRideList()
    {
        /** @var MockServer $mockServer */
        $mockServer = Container::getInstance()
            ->getService(TaurusContainerConfig::SERVICE_MOCK_SERVER);

        $actualResponse = $mockServer->get(
            '/api/rides',
            'GET',
            [],
            [],
            [
                'x-token' => $this->login()->getEncodedTokenString()
            ]
        );

        $this->compareResultToFixture(
            $actualResponse,
            __FUNCTION__,
            'Could not get all resources for rides through the standard api controller'
        );

    }

    public function testRideFilterFrom()
    {
        /** @var MockServer $mockServer */
        $mockServer = Container::getInstance()
            ->getService(TaurusContainerConfig::SERVICE_MOCK_SERVER);

        $actualResponse = $mockServer->get(
            '/api/ridesearch',
            'GET',
            [
                'from' => 'mun'
            ],
            [],
            [
                'x-token' => $this->login()->getEncodedTokenString()
            ]
        );

        $this->compareResultToFixture(
            $actualResponse,
            __FUNCTION__,
            'Could not get all resources for rides through the standard api controller'
        );
    }

    public function testRideFilterBasicSearch()
    {
        /** @var MockServer $mockServer */
        $mockServer = Container::getInstance()
            ->getService(TaurusContainerConfig::SERVICE_MOCK_SERVER);

        $actualResponse = $mockServer->get(
            '/api/ridesearch',
            'GET',
            [
                'from' => 'mu',
                'to' => 'K',
                'travelDay' => '2017-06-21'
            ],
            [],
            [
                'x-token' => $this->login()->getEncodedTokenString()
            ]
        );

        $this->compareResultToFixture(
            $actualResponse,
            __FUNCTION__,
            'Could not get all resources for rides through the standard api controller'
        );

    }
}
