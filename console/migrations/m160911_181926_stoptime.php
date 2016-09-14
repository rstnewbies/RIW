<?php

use yii\db\Migration;

class m160911_181926_stoptime extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%stoptime}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull()->unique(),
            'stop_time' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160911_181926_stoptime cannot be reverted.\n";

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
