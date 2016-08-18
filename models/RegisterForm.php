<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Description of RegisterForm
 *
 * @property User|null $user This property is read-only.
 * @author ilya
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $passwordConfirm;

    private $_user = false;
        
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'passwordConfirm'], 'required'],
            [['username', 'password'], 'string', 'max' => 255, 'min' => 5],
            // password is validated by validatePassword()
            ['passwordConfirm', 'validatePasswordConfirm'],
        ];
    }
    
    /**
     * Проверяет соответствие двух введённых паролей
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePasswordConfirm($attribute, $params)
    {
        if ($this->password !== $this->passwordConfirm) {
            $this->addError($attribute, 'Пароли не совпадают.');
            return false;
        }
    }
    
    public function register()
    {        
        if ($this->validate()) {
            $this->_user = new User;
            $this->_user->load($this->attributes, '');
            if ($this->_user->save()) {
                return true;
            } else {
                $this->addErrors($this->_user->getErrors());
            }
        }
        return false;
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    
}
