<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 19/06/17
 * Time: 20:21
 */

namespace carcada\config;


use taurus\framework\config\TaurusContainerConfig;
use taurus\framework\container\AbstractContainerConfig;
use taurus\framework\container\ServiceConfig;
use taurus\framework\db\mysql\MySqlQueryStringBuilderImpl;
use taurus\framework\Environment;

class CarcadaTestContainerConfig extends AbstractContainerConfig
{
    protected function configure()
    {
        $this->serviceDefinitions[TaurusContainerConfig::SERVICE_ENVIRONMENT] =
            new ServiceConfig(TaurusContainerConfig::SERVICE_ENVIRONMENT,
                'environment',
                [Environment::TEST],
                true
            );

        $this->serviceDefinitions[TaurusContainerConfig::SERVICE_MYSQL_CONNECTION] =
            new ServiceConfig(TaurusContainerConfig::SERVICE_MYSQL_CONNECTION,
                'MysqlConnection',
                ['localhost', 'root', 'carcada2017', 'carcada_test', MySqlQueryStringBuilderImpl::class],
                true
            );
    }
}
