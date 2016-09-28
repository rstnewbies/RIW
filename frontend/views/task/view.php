<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'text:ntext',
             [
                'label'  => 'image',
                'attribute'=>'photo',
                'value' =>  Yii::$app->params['backendDomain'].$model->image,
                'format' => ['image',['class'=>'img-responsive']],
            ],
        ],
    ]) ?>

</div>
