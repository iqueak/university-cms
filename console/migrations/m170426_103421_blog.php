<?php

use common\models\User;
use yii\db\Migration;
use yii\db\Schema;

class m170426_103421_blog extends Migration
{
    public function up()
    {
        $this->createTable('{{%news}}', [
            'id' => Schema::TYPE_PK,
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'summary' => Schema::TYPE_TEXT,
            'content' => Schema::TYPE_TEXT,
            'image_path' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%news_category}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%events}}', [
            'id' => Schema::TYPE_PK,
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'organizer' => Schema::TYPE_STRING . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'summary' => Schema::TYPE_TEXT,
            'content' => Schema::TYPE_TEXT,
            'image_path' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',
            'event_date' => Schema::TYPE_DATETIME . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%events_category}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%blog_menu_items}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'url' => Schema::TYPE_STRING. ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
        ]);
//        $this->createTable('{{%images}}', [
//            'id' => Schema::TYPE_PK,
//            'tag' => Schema::TYPE_STRING,
//            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
//            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
//        ]);

        $this->addForeignKey('fk_news_category_id', '{{%news}}', 'category_id', '{{%news_category}}', 'id', null, 'CASCADE');
        $this->addForeignKey('fk_events_category_id', '{{%events}}', 'category_id', '{{%events_category}}', 'id', null, 'CASCADE');
        //$this->addForeignKey('fk_news_image_id', '{{%news}}', 'image_id', '{{%images}}', 'id', null, 'CASCADE');
        //$this->addForeignKey('fk_events_image_id', '{{%events}}', 'image_id', '{{%images}}', 'id', null, 'CASCADE');

        $user = new User();
        $user->username = 'admin';
        $user->email = 'iqueak@gmail.com';
        $user->setPassword('admin');
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;

        $user->save();
    }

    public function down()
    {
        $this->dropForeignKey('fk_news_category_id', '{{%news}}');
        $this->dropForeignKey('fk_events_category_id', '{{%events}}');
        //$this->dropForeignKey('fk_news_image_id', '{{%news}}');
        //$this->dropForeignKey('fk_events_image_id', '{{%events}}');

        $this->dropTable('{{%news}}');
        $this->dropTable('{{%news_category}}');
        $this->dropTable('{{%events}}');
        $this->dropTable('{{%events_category}}');
        $this->dropTable('{{%blog_menu_items}}');
        //$this->dropTable('{{%images}}');
    }
}
