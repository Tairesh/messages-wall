<?php

/* @var $this \yii\web\View */
/* @var $messages app\models\Message[] */

use yii\helpers\Html;

?>

<?php foreach ($messages as $message):?>
    <div class="well">
        <h5><?=Html::encode($message->user->username)?>:</h5>
        <?=nl2br(Html::encode($message->text))?>
    </div>
<?php endforeach ?>