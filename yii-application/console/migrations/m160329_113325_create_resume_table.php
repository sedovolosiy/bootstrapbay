<?php

use yii\db\Migration;

class m160329_113325_create_resume_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%resume}}', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%resume}}');
    }
}
