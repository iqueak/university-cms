<?php

use yii\db\Migration;
use yii\db\Schema;

class m170517_223934_studying extends Migration
{
    public function up()
    {
        $this->createTable('{{%students}}', [
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'middle_name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name' => Schema::TYPE_STRING . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%groups}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'speciality' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%teachers}}', [
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'middle_name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name' => Schema::TYPE_STRING . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'cathedra_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'rank' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%cathedres}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%subjects}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%studying}}', [
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'subject_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'teacher_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lessons_type' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lessons_hours' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%progress}}', [
            'students_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'subject_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'teacher_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lessons_type' => Schema::TYPE_INTEGER . ' NOT NULL',
            'value' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%students}}');
        $this->dropTable('{{%groups}}');
        $this->dropTable('{{%teachers}}');
        $this->dropTable('{{%cathedres}}');
        $this->dropTable('{{%subjects}}');
        $this->dropTable('{{%studying}}');
        $this->dropTable('{{%progress}}');
    }
}
