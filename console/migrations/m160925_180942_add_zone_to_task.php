<?php

use yii\db\Migration;

class m160925_180942_add_zone_to_task extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE `task` ADD `zone` VARCHAR(255) NOT NULL AFTER `image`;');
       
    }

    public function down()
    {
        echo "m160925_180942_add_zone_to_task cannot be reverted.\n";

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
