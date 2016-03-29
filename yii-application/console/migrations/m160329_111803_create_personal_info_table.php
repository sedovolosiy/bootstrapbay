<?php

use yii\db\Migration;

class m160329_111803_create_personal_info_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%personal_info}}', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%personal_info}}');
    }
}
