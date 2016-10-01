<?php

use yii\db\Migration;

class m161001_150953_add_time_to_complete_task extends Migration
{
    public function up()
    {
       $this->execute('TRUNCATE TABLE complete_task');
       $this->execute('ALTER TABLE `complete_task` ADD `time` VARCHAR(255) NOT NULL AFTER `task_id`;');
    }

    public function down()
    {
        echo "m161001_150953_add_time_to_complete_task cannot be reverted.\n";

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
