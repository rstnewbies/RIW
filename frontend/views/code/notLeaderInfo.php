<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \common\models\User;

 $leaderGroup = User::find()->where(['group_id' => Yii::$app->user->identity->group_id])->orderBy("leader_points DESC")->one()

?>
<div class="site-about">
    <div class="col-lg-11 text-center info-title">
        <h1> Tylko lider może wpisać kod, Liderem twojej kompani jest <?php echo $leaderGroup->name," ",  $leaderGroup->last_name; 
        echo Html::a(" Powrót do panelu", ['site/index']); ?>
        </h1>
        
    </div> 
</div>
    
