<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Time */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'end_time',
        'name' => 'datetime_10',
        'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'y/M/d H:i:s',
            'todayHighlight' => true
        ]])?>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
