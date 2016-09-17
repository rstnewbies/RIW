<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>DASZBORD</h1>
    </div>
    <div class ="jumbotron">
        <div class="row">
            <div class="col-lg-4 dashboard-div-btn">
                <?php echo Html::a("Users", ["user/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                <?php echo Html::a("Group", ["group/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">

                <?php echo Html::a("Task", ["task/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Time", ["time/update",'id'=>'1'],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Ranking", ["ranking/index",'id'=>'1'],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Tasks & Code to print", ["print/index",'id'=>'1'],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Odsłoń obrazek", ["auto-show-image/index",'id'=>'1'],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            
        </div>

    </div>
</div>
