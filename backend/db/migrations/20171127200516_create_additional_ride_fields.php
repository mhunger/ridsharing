<?php


use Phinx\Migration\AbstractMigration;

class CreateAdditionalRideFields extends AbstractMigration
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

        $this->query('ALTER TABLE `ride` ADD `pet` BOOL  NOT NULL  DEFAULT \'0\'   AFTER `description`');
        $this->query('ALTER TABLE `ride` ADD `twoseats` BOOL  NULL  DEFAULT \'0\'   AFTER `pet`');
        $this->query('ALTER TABLE `ride` ADD `woman` BOOL  NULL  DEFAULT \'0\'   AFTER `twoseats`');
        $this->query('ALTER TABLE `ride` ADD `smoker` BOOL  NULL  DEFAULT \'0\'   AFTER `woman`');
        $this->query('ALTER TABLE `ride` ADD `baggageSize` VARCHAR(255)  NULL  DEFAULT \'\'  AFTER `smoker`');
        $this->query('ALTER TABLE `ride` ADD `detour` VARCHAR(255)  NULL  DEFAULT \'\'  AFTER `baggageSize`');
        $this->query('ALTER TABLE `ride` CHANGE `baggageSize` `baggage_size` VARCHAR(255)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT \'\'');
    }
}
