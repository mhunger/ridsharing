<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 19/06/17
 * Time: 20:16
 */

namespace carcada\config;


use taurus\framework\config\TaurusContainerConfig;
use taurus\framework\container\AbstractContainerConfig;
use taurus\framework\container\ServiceConfig;
use taurus\framework\db\mysql\MySqlQueryStringBuilderImpl;

class CarcadaContainerConfig extends AbstractContainerConfig
{
    const SERVICE_CARCADA_ROUTE_CONFIG = CarcadaRouteConfig::class;

    protected function configure()
    {

        $this->serviceDefinitions[TaurusContainerConfig::SERVICE_MYSQL_CONNECTION] =
            new ServiceConfig(TaurusContainerConfig::SERVICE_MYSQL_CONNECTION,
                'MysqlConnection',
                ['localhost', 'root', 'carcada2017', 'carcada', MySqlQueryStringBuilderImpl::class],
                true
            );

        $this->serviceDefinitions[TaurusContainerConfig::SERVICE_ROUTER] =
            new ServiceConfig(TaurusContainerConfig::SERVICE_ROUTER,
                'router',
                [
                    CarcadaRouteConfig::class,
                    null
                ]);

        $this->serviceDefinitions[self::SERVICE_CARCADA_ROUTE_CONFIG] =
            new ServiceConfig(self::SERVICE_CARCADA_ROUTE_CONFIG,
                null,
                [CarcadaRouteConfig::API_BASE_PATH],
                true
            );
    }
}