<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>DASZBORD</h1>
    </div>
    
    <div class="row jumbotron">
        Status zadań : <?php echo \common\models\TaskStatus::find()->where(['id'=>1])->one()->status ?>
        <br>
        Status strefy : <?php echo \common\models\TaskZoneStatus::find()->where(['id'=>1])->one()->status ?>
        <br>
        Status zadania dodatkowego : <?php echo \common\models\PremiumTaskStatus::find()->where(['id'=>1])->one()->status ?>
    </div>
    
    <div class ="jumbotron">
            <div class="col-lg-4 dashboard-div-btn">
                <?php echo Html::a("Users", ["user/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                <?php echo Html::a("Group", ["group/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">

                <?php echo Html::a("Task", ["task/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
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
                 <?php echo Html::a("Odsłoń obrazek", ["show-image/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Zasłoń obrazek", ["un-show-image/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Pokaż bonusowe zadanie", ["task/bonus"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Ukryj bonusowe zadanie", ["task/un-bonus"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Pokaż zadania dla strefy Wrocław", ["task/wroclaw"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Pokaż zadania dla strefy Katowice", ["task/katowice"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Ukryj Zadania", ["task/hide"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Pokaż zadania", ["task/show"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
            <div class="col-lg-4 dashboard-div-btn">
                 <?php echo Html::a("Wykonane Zadania", ["complete-task/index"],['class'=>'btn btn-lg btn-warning dashboard-btn']); ?>  
            </div>
    </div>
</div>
