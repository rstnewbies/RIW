<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2b246d11aba863719d2a42255ede141941005b90
                <?php echo Html::a("Task", ["task/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 dashboard-div-btn">
                <?php echo Html::a("Code", ["code/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
<<<<<<< HEAD
=======
                <?php echo Html::a("Time", ["time/update",'id'=>'1'],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
>>>>>>> feature/zegatek
=======
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Time", ["time/update",'id'=>'1'],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
>>>>>>> 2b246d11aba863719d2a42255ede141941005b90
            </div>
        </div>

    </div>
</div>
