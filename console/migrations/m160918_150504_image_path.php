<?php

use yii\db\Migration;

class m160918_150504_image_path extends Migration
{
    public function up()
    {
      $this->addColumn('{{%task}}', 'image', 'string AFTER `score` ', $this->string->notNull()); 
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
