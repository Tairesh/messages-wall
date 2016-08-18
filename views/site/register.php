<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';

?>
<div class="span8 offset4">
    <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{input}\n<span class=\"help-inline error\">{error}</span>",
                'options' => ['class' => 'control-group']
            ],
        ]); ?>
    <div class="control-group">
        <b>Регистрация</b>
    </div>
    
    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Логин']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>
    
    <?= $form->field($model, 'passwordConfirm')->passwordInput(['placeholder' => 'Повторите пароль']) ?>

    <div class="control-group">
        <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>