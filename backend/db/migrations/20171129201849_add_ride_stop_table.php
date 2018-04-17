<?php


use Phinx\Migration\AbstractMigration;

class AddRideStopTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->query('DROP TABLE IF EXISTS `ride_stop`');
        $this->query('CREATE TABLE `ride_stop` (
  `id` int(11) unsigned NOT NULL DEFAULT \'0\',
    `stop_name` varchar(255) NOT NULL DEFAULT \'\',
      PRIMARY KEY (`id`),
  `id_ride` int(10) unsigned NOT NULL,
  KEY `fk_ride_stop_ride` (`id_ride`),
  CONSTRAINT `fk_ride_stop_ride` FOREIGN KEY (`id_ride`) REFERENCES `ride` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }
}
