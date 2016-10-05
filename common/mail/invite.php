<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->params['frontendDomain'].\yii\helpers\Url::to(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Witaj <?= Html::encode($user->name) ?> <?= Html::encode($user->last_name) ?>,</p>

    <p>Kliknij poniższy link aby ustawić hasło do aplikacji RSTKompas i zacząć zabawę z nami.</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
