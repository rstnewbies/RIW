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
            <t>QR</t>
        </div>
    </div>
</div>
    <?php  
        Modal::begin([
            'header'=>'Siusiak',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
        
        $user = User::findOne(16);
        $groupUser = User::find()->with('groupUser')->asArray()->all();
        
        echo "<div id='modalContent'></div>";
        echo Html::button($groupUser);
                
        Modal::end();
    ?>

    
   