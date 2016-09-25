<?php

use yii\db\Migration;

class m160925_182532_task_zone_status extends Migration
{
    public function up()
    {
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%task_zone_status}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160925_182532_task_zone_status cannot be reverted.\n";

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
