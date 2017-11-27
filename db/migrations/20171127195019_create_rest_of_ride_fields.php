<?php


use Phinx\Migration\AbstractMigration;

class CreateRestOfRideFields extends AbstractMigration
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
        $this->query(
            'CREATE TABLE `ride` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `type` varchar(100) DEFAULT NULL,
              `from` varchar(255) NOT NULL DEFAULT \'\',
              `to` varchar(255) DEFAULT NULL,
              `id_user_offered_by` int(11) unsigned DEFAULT NULL,
              `travel_day` date DEFAULT NULL,
              `departure_time` time DEFAULT NULL,
              `arrival_time` time DEFAULT NULL,
              `seats` int(11) unsigned NOT NULL,
              `price` decimal(6,2) unsigned NOT NULL,
              `departure_location` varchar(255) DEFAULT \'\',
              `description` text,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->query(
            'CREATE TABLE `user` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `email` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT \'\',
              `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
              `last_name` varchar(255) DEFAULT NULL,
              `first_name` varchar(255) DEFAULT NULL,
              `img` varchar(255) DEFAULT NULL,
              `user_rating` decimal(2,1) DEFAULT NULL,
              `language` varchar(255) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
    }
}
