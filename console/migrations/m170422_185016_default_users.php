<?php

use common\models\User;
use yii\db\Migration;

class m170422_185016_default_users extends Migration
{
    public function up()
    {
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
