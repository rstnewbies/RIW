<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Complete Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complete-task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Complete Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
            'attribute' => 'group_id',
            'enableSorting'=>true,
            'format' => 'raw',
            'header' => 'Group',
            'value' => function($data) {
            return \common\models\Group::find()->where(['id'=>$data->group_id])->one()->name;
            }
            ],
                        [
            'attribute' => 'task_id',
            'enableSorting'=>true,
            'format' => 'raw',
            'header' => 'Task',
            'value' => function($data) {
            return \common\models\Task::find()->where(['id'=>$data->task_id])->one()->title;
            }
            ],
            'time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
