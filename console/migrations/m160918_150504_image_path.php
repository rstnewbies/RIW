<?php

use yii\db\Migration;

class m160918_150504_image_path extends Migration
{
    public function up()
    {
      $this->execute("ALTER TABLE `task` ADD `image` VARCHAR(255) NOT NULL AFTER `score`;");
    }

    public function down()
    {
        echo "m160918_150504_image_path cannot be reverted.\n";

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
