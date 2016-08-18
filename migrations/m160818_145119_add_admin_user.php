<?php

use yii\db\Migration;
use app\models\User;

class m160818_145119_add_admin_user extends Migration
{
    public function up()
    {
        $user = new User();
        $user->username = 'admin';
        $user->password = 'admin';
        $user->save();
    }

    public function down()
    {
        $user = User::findByUsername('admin');
        $user->delete();
    }

}
