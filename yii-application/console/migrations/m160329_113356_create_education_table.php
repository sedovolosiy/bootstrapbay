<?php

use yii\db\Migration;

class m160329_113356_create_education_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%education}}', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%education}}');
    }
}
