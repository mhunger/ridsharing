<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 12/11/17
 * Time: 18:07
 */

namespace carcada\test;


use taurus\framework\config\TaurusContainerConfig;
use taurus\framework\Container;
use taurus\framework\mock\MockRequest;
use taurus\framework\routing\Request;
use taurus\framework\security\StandardTokenAuthenticationServiceImpl;
use taurus\framework\security\Token;
use taurus\tests\AbstractDatabaseTest;

abstract class AbstractCarcadaDatabaseTest extends AbstractDatabaseTest
{
    /** @var StandardTokenAuthenticationServiceImpl */
    protected $authenticationService;

    /** @var array */
    protected $fixtureFiles = [];

    /** @var string */
    protected $fixturePath;

    /**
     * Set the test config in container and load the fixture path.
     */
    public function setUp()
    {
        $this->dbname = 'carcada_test';
        $this->dbuser = 'root';
        $this->dbpw= 'carcada2017';
        $this->dbhost = 'localhost';

        $this->fixturesDbState = 'fixtures/db/';

        $this->fixturesJsonResults = 'fixtures/json/';


        $this->authenticationService = Container::getInstance()->getService(TaurusContainerConfig::SERVICE_STANDARD_AUTHENTICATION_SERVICE);

        parent::setUp();
    }


    /**
     * @return Token
     */
    protected function login(): Token
    {
        /** @var MockRequest $mockRequest */
        $mockRequest = Container::getInstance()->getService(TaurusContainerConfig::SERVICE_MOCK_REQUEST);
        $mockRequest->setInputBody(
            [
                'username' => 'mike',
                'password' => 'mike123'
            ]
        )->setUrl('/user/login')
            ->setMethod(Request::HTTP_POST);

        return $this->authenticationService->authenticate($mockRequest);
    }


    protected function getFixturePath()
    {
        $this->fixturePath = $this->fixturesDbState;

    }

    protected function getJsonResultFilePath(string $class, string $method)
    {
        return getcwd() . DIRECTORY_SEPARATOR . $this->fixturesJsonResults . basename(str_replace('\\', '/', $class)) . '-' . $method . '.json';
    }

}