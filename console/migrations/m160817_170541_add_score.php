<?php

use yii\db\Migration;

class m160817_170541_add_score extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `group` ADD `score` INT NOT NULL DEFAULT '0' AFTER `color`; ");
    }

    public function down()
    {
        echo "m160817_170541_add_score cannot be reverted.\n";

        return false;
    }
}
