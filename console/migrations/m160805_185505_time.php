<?php

use yii\db\Migration;

class m160805_185505_time extends Migration
{
    public function up()
    {
         if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
      $this->createTable('{{%time}}', [
            'id' => $this->primaryKey(),
            'end_time' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160805_185505_time cannot be reverted.\n";

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
