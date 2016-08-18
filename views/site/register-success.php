<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Регистрация успешна';

?>
<div class="span8 offset2">

    <h3>Ура!</h3>

    <p>
        Поздравляем! Вы успешно зарегистрировались. 
    </p>

    <p>
        Воспользуйтесь <?=Html::a('формой авторизации',['site/login'])?> чтобы войти на сайт под своей учетной записью 
    </p>
</div>