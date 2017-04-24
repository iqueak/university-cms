<?php

use yii\db\Migration;
use yii\db\Schema;

class m170423_202822_main_menu extends Migration
{
    public function up()
    {
        $this->createTable('{{%main_menu}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_TEXT . ' NOT NULL',
            'url' => \yii\db\cubrid\Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%main_menu}}');
    }
}
