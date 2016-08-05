<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    
    <div class="jumbotron">
        <div class="col-lg-12 text-center kafelek time-arena ">
          <?php echo \russ666\widgets\Countdown::widget([
    'datetime' => \common\models\Time::getEndTime(),
    'format' => '%H:%M:%S',
    'events' => [
        'finish' => 'function(){location.reload()}',
    ],
])?>
        </div>
        <div class="col-lg-12 text-center kafelek qr-btn">
             <?php echo Html::a("QR", ["site/qr"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
        </div>
    </div>
    
   