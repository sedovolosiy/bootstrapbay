<?php

use yii\db\Migration;

class m160329_112950_create_profile_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%profile}}');
    }
}
