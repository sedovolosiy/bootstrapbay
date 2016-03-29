<?php

use yii\db\Migration;

class m160329_113021_create_work_table extends Migration
{
    public function up()
    {
        $this->createTable('work', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('work_table');
    }
}
