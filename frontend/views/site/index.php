<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
use common\models\User;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <div class="col-lg-12 text-center kafelek time-arena ">
            <t>47:23:32</t>
        </div>
        <div class="col-lg-12 text-center kafelek qr-btn">
            
        </div>
    </div>
</div>
    <?php
    $loggedUser = Yii::$app->user->identity;
    if($loggedUser->voting == 0){
        Modal::begin([
            'header'=>'Zagłosuj na lidera',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
        
        $groupUsers = User::find()->where(['group_id'=>$loggedUser->group_id])->with('groupUser')->all();
        
        echo "<div id='modalContent'></div>";
        foreach ($groupUsers as $user){
            
        echo Html::a($user->name." ".$user->last_name, ['leader', 'id' => $user->id], ['class' => 'btn btn-success']);        
        echo '<br>';
        }      
        Modal::end(); 
    }
        ?>
   