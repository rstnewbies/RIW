<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CompleteTask */

$this->title = 'Create Complete Task';
$this->params['breadcrumbs'][] = ['label' => 'Complete Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complete-task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
