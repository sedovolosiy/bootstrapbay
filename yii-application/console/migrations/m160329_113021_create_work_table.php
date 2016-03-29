<?php

use yii\db\Migration;

class m160329_113021_create_work_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%works}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'short_description' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'image' => $this->string(255)->notNull()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%works}}');
    }
}
