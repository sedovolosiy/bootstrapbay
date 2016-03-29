<?php

use yii\db\Migration;

class m160329_113709_create_skills_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%skills}}', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%skills}}');
    }
}
