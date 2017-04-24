<?php

use yii\db\Migration;

class m170423_122826_events extends Migration
{
    public function up()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'organizer' => $this->string()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'summary' => $this->text(),
            'content' => $this->text(),
            'status' => $this->integer(3)->notNull(),
            'event_date' => $this->dateTime()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
        $this->createTable('{{%events_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
        $this->addForeignKey('fk_events_category_id', '{{%events}}', 'category_id', '{{%events_category}}', 'id', null, 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_events_category_id', '{{%events}}');
        $this->dropTable('{{%events}}');
        $this->dropTable('{{%events_category}}');
    }
}
