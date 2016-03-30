<?php

use yii\db\Migration;
use yii\db\Schema;

class m160329_111803_create_personal_info_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%personal_info}}', [
            'id' => $this->primaryKey(),
            'user_email' => Schema::TYPE_STRING . ' NOT NULL',
            'image' => Schema::TYPE_STRING . '(255) NOT NULL',
            'first_name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'last_name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'position' => Schema::TYPE_STRING . '(255) NOT NULL',
            'date_of_birth' =>Schema::TYPE_DATE . ' NOT NULL',
            'address' => Schema::TYPE_STRING . ' NOT NULL',
            'phone' => Schema::TYPE_STRING . ' NOT NULL',
            'website' => Schema::TYPE_STRING . '(150) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%personal_info}}');
    }
}
