<?php

use yii\db\Migration;

class m160929_171420_update_premium_task extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE `premium_task_status` CHANGE `status` `status` VARCHAR(6) NULL DEFAULT NULL;');
    }

    public function down()
    {
        echo "m160929_171420_update_premium_task cannot be reverted.\n";

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
