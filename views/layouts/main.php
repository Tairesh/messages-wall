<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html,
    app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="navbar">
    <div class="navbar-inner">
        <?=Html::a('Сайтсофт', ['/'], ['class' => 'brand'])?>
        <ul class="nav">
            <li class="<?=$this->context->action->id === 'index' ? 'active' : ''?>" ><?=Html::a('Главная',['/'])?></li>
            <?php if (Yii::$app->user->isGuest): ?>
            <li class="<?=$this->context->action->id === 'login' ? 'active' : ''?>" ><?=Html::a('Авторизация',['site/login'])?></li>
            <li class="<?=$this->context->action->id === 'register' ? 'active' : ''?>" ><?=Html::a('Регистрация',['site/register'])?></li>
            <?php endif ?>
        </ul>
        
        <?php if (!Yii::$app->user->isGuest): ?>
        <ul class="nav pull-right">
            <li><a href="javascript:void(0);"><?=Yii::$app->user->identity->name?></a></li>
            <li><?=Html::a('Выход', ['site/logout'], ['data-method' => 'POST'])?></li>
        </ul>
        <?php endif ?>
    </div>
</div>
<div class="row-fluid">
    <?= $content ?>
</div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
