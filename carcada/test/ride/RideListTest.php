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
            'ride_stop.xml'
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
            []
        );

        $this->compareResultToFixture(
            $actualResponse,
            __FUNCTION__,
            'Could not get all resources for rides through the standard api controller'
        );

    }
}
