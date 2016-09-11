<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Code;
use common\models\Task;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task & Code';
$this->params['breadcrumbs'][] = $this->title;
$task = new ActiveDataProvider([
            'query' => Task::find()->where('id>=0')->orderBy('score DESC'),
        ]);

?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $task,
        'columns' => [
            'title',
            'text',
            [
                'label' => 'Code',
                'format' => 'raw',
                'value' => function($dataProvider){
                    return Code::findByTaskId($dataProvider->id)->code;
                }
            ],
        ],
    ]); ?>
</div>