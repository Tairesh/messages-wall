<?php

use yii\db\Migration;

class m160817_142603_start extends Migration
{
    
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL',
            'username' => 'VARCHAR(255) NOT NULL',
            'password' => 'VARCHAR(255) NOT NULL'
        ]);
        $this->createIndex('username', 'users', ['username'], true);
        
        $this->createTable('messages', [
            'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL',
            'userId' => 'INTEGER REFERENCES users(id) NOT NULL',
            'text' => 'TEXT NOT NULL'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('messages');
    }
}
