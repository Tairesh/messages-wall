<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
?>
<div class="span3 offset4">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{input}",
            'options' => ['class' => 'control-group']
        ],
    ]); ?>
    
    <div class="control-group">
        <b>Авторизация</b>
    </div>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Логин']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>

    <div class="control-group">
        <label class="checkbox"><?=Html::checkbox('LoginForm[rememberMe]')?> Запомнить меня</label>
        <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div style="color:#999;">
        Вы можете войти с помощью логина и пароля <strong>admin/admin</strong>.
    </div>
</div>
