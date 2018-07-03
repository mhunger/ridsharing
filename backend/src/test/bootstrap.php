<?php
/**
 * Created by PhpStorm.
 * User: michaelhunger
 * Date: 23/10/16
 * Time: 13:29
 */

use carcada\config\CarcadaContainerConfig;
use carcada\config\CarcadaTestContainerConfig;
use Phinx\Console\PhinxApplication;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;
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

/**
 * Setup the database
 * - drop carcada_test database
 * - create carcada_test database
 * - run the migrations
 */
/** @var \taurus\framework\db\mysql\MySqlConnection $mysql */
$mysql = \taurus\framework\Container::getInstance()->getService(TaurusContainerConfig::SERVICE_MYSQL_CONNECTION);

$mysql->executeRaw('CREATE DATABASE IF NOT EXISTS carcada_test ');

/** run migrations to create db structure */
$app = new PhinxApplication();
$app->setAutoExit(false);
$app->run(new StringInput('migrate -e testing -c ../../phinx.yml'), new NullOutput());
unset($app);