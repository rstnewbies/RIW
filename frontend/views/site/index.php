<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use \common\models\Task;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this->title = 'RST Compas DashBoard View';
$dataProvider = new ActiveDataProvider([
    'query' => Task::find(),
    'pagination' => [
        'pageSize' => 40,
    ],]);
?>
<div class="site-index">
    
    <div class="jumbotron">
        <div class="col-lg-12 text-center kafelek time-arena ">
            <t>47:23:32</t>
        </div>
        <div class="col-lg-12 text-center kafelek task-view">
        	<h2>Lista Tasków</h2>
        	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [ 
            'title',
            'text:ntext',
            'score',
        ],
    ]); ?>
    <?php echo Html::a("Pełna lista Tasków", ["task/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>
        </div>
    </div>
