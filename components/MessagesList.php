<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Message;

/**
 * Виджет для отображения стены сообщений
 *
 * @author ilya
 */
class MessagesList extends Widget
{
    
    private $_messages = [];
    
    public function init()
    {
        $this->_messages = Message::find()->orderBy(['id' => SORT_DESC])->with('user')->all();
        return parent::init();
    }
    
    public function run()
    {
        return $this->render('messages-list', [
            'messages' => $this->_messages
        ]);
    }
    
    public function getViewPath()
    {
        return "@app/views/components";
    }
}
