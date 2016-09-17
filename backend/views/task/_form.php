<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';
Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/uploads/';
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'score')->dropDownList(['1'=>1,'3'=>3]) ?>
    
    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],   
    ]); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
