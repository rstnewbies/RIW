<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Task;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
$task = new ActiveDataProvider([
            'query' => Task::find()->where('id>=0')->orderBy('score DESC'),
        ]);
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $task,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'text:ntext',
            'score',
            
            [
                'label'  => 'image',
                'attribute' => 'photo',
                'value' => function($dataProvider){
                return Task::getImagePath($dataProvider->id)->image;},
                'format' => ['image',['width'=>'50','height'=>'50']],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
