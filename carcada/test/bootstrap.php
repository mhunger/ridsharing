<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 23/10/16
 * Time: 13:29
 */

use carcada\config\CarcadaContainerConfig;
use carcada\config\CarcadaTestContainerConfig;
use taurus\framework\config\TaurusConfig;
use taurus\framework\config\TaurusContainerConfig;
use taurus\framework\Container;
use taurus\framework\Environment;

require_once __DIR__ . "/../../vendor/autoload.php";
set_include_path(get_include_path() . ".:..");
spl_autoload_register();

$config = new TaurusContainerConfig();
$config->merge(new CarcadaContainerConfig());
if(getenv('TAURUS_ENV') == Environment::TEST) {
    $config->merge(
        new CarcadaTestContainerConfig()
    );
}

Container::getInstance()->setContainerConfig($config);
/** Load user config */
/** @var TaurusConfig $taurusConfig */
$taurusConfig = Container::getInstance()->getService(TaurusContainerConfig::SERVICE_TAURUS_CONFIG);
$taurusConfig->loadUserConfigFromYaml(file_get_contents('../config/carcada.conf.yaml'));
/** @var \taurus\framework\db\mysql\MySqlConnection $mysql */
$mysql = \taurus\framework\Container::getInstance()->getService(TaurusContainerConfig::SERVICE_MYSQL_CONNECTION);
system('mysql --user=carcada --password=carcada carcada_test < carcada-test-schema.sql');