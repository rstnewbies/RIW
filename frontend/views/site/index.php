<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use \common\models\Task;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    
    <div class="jumbotron">
        <div class="col-lg-12 text-center kafelek time-arena ">
            <t>47:23:32</t>
        </div>
        <div class="col-lg-12 text-center kafelek qr-btn">
            <?php  Task::getTask(1);
                    ?>
            
            
        </div>
    </div>
    
   