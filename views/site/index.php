<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Message */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\MessagesList;

$this->title = 'Стена сообщений';

?>
<div class="span8 offset2">

    <?php if (!Yii::$app->user->isGuest): ?>
    
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{input}",
            'options' => ['class' => 'control-group']
        ],
        'enableClientValidation' => false
    ]); ?>
    
        <?php if (Yii::$app->session->getFlash('messageSubmitFailed')): ?>
        <div class="alert alert-error">
            Сообщение не может быть пустым 
        </div>
        <?php endif ?>

        <?=$form->field($model, 'text')->textarea(['placeholder' => 'Ваше сообщение...', 'style' => 'width:100%; height: 50px', 'autofocus' => true])?>
 
        <div class="control-group">
            <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
        </div>
    
    <?php ActiveForm::end(); ?>
    
    <?php endif ?>
    
    <?=MessagesList::widget()?>
    
</div>