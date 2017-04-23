<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170422_174242_news extends Migration
{
    public function up()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'summary' => $this->text(),
            'content' => $this->text(),
            'status' => $this->integer(3)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
        $this->createTable('{{%news_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
        $this->addForeignKey('fk_news_category_id', '{{%news}}', 'category_id', '{{%news_category}}', 'id', null, 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_news_category_id', '{{%news}}');
        $this->dropTable('{{%news}}');
        $this->dropTable('{{%news_category}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
