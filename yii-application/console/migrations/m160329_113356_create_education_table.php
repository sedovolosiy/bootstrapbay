<?php

use yii\db\Migration;
use yii\db\Schema;

class m160329_113356_create_education_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%education}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'title' => Schema::TYPE_STRING.'(255) NOT NULL',
            'date' => Schema::TYPE_DATE.' NOT NULL',
            'description' => Schema::TYPE_TEXT,
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%education}}');
    }
}
