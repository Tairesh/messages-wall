<?php

namespace app\models;

/**
* This is the model class for table "users".
*
* @property integer $id
* @property string $username
* @property string $password
*
* @property Message[] $messages
*/
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'users';
    }

    /** 
     * @inheritdoc 
     */ 
    public function rules() 
    { 
        return [ 
            [['username', 'password'], 'required'], 
            [['username', 'password'], 'string', 'max' => 255, 'min' => 5], 
            [['username'], 'unique'], 
        ]; 
    } 

    /** 
     * @inheritdoc 
     */ 
    public function attributeLabels() 
    { 
        return [ 
            'id' => 'ID', 
            'username' => 'Username', 
            'password' => 'Password', 
        ]; 
    } 

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getMessages() 
    { 
        return $this->hasMany(Message::className(), ['userId' => 'id']); 
    }

    public function getAuthKey()
    {
        return md5($this->username.$this->password);
    }

    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        return $authKey === md5($this->username.$this->password);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
    
    /**
     * 
     * @param string $username
     * @return User
     */
    public static function findByUsername($username)
    {
        return static::find()->where(['username' => $username])->one();
    }
    
    /**
     * Пароли хэшируются и проверяются с помощью стандартного API bCrypt (работает с PHP 5.5+)
     * @param string $password
     * @return boolean
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        }
        return parent::beforeSave($insert);
    }

}
