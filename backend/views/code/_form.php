<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Task;
/* @var $this yii\web\View */
/* @var $model common\models\Code */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_id')->dropdownList(
    Task::find()->select(['title'])->indexBy('id')->column(),
    ['prompt'=>'Wybierz zadanie'])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
