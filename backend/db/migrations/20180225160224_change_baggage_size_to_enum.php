<?php


use Phinx\Migration\AbstractMigration;

class ChangeBaggageSizeToEnum extends AbstractMigration
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

        $this->query("ALTER TABLE `ride` CHANGE `baggage_size` `baggage_size` ENUM('S', 'M', 'L', 'XL')  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL");
    }
}
