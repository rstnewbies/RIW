<?php
use yii\helpers\Html;
use common\models\User;
?>
<div class="site-about">
    <?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn']); ?>
    <br>
    <br>
    <br>
    <div class="col-lg-11 text-center resetPassword">
        <h1> Tylko lider drużyny może wpisywać kody.</h1> 
        <h2> A ty nim nie jesteś.</h2>
        <h1> Twoim liderem jest
        <?php 
        $leaderGroup = User::find()->where(['group_id' => Yii::$app->user->identity->group_id])->orderBy("leader_points DESC")->one();
        echo $leaderGroup->name . " " . $leaderGroup->last_name;
        ?>
        </h1>
    </div> 
</div>

    
