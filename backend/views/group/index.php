<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
            'attribute' => 'color',
            'enableSorting'=>true,
            'format' => 'raw',
            'header' => 'Color',
            'value' => function($data) {
            return $data->getColorName($data->color);
            }
            ],
            'score',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
