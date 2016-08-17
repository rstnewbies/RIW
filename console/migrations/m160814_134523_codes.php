<?php

use yii\db\Migration;

class m160814_134523_codes extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%codes}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->unique(),
            'task_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160814_134523_codes cannot be reverted.\n";

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
