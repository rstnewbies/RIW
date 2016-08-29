<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Code;
use common\models\Task;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider = new ActiveDataProvider([
            'query' => Task::find(),
        ]);
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            'text',
            [
                'label' => 'Code',
                'format' => 'raw',
                'value' => Code::findByTaskId($dataProvider->id),
            ],
            
        ],
    ]); ?>
</div>