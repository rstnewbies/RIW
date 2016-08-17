<?php

use yii\db\Migration;

class m160817_143624_update_user extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `user` ADD `leader_points` INT NOT NULL DEFAULT '0' AFTER `group_id`, ADD `voting` INT NOT NULL DEFAULT '0' AFTER `leader_points`;");
    }

    public function down()
    {
        echo "m160817_143624_update_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
