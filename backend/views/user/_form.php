<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Group;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>--> 

    <!--<?= $form->field($model, 'email') ?>-->

    <!--<?= $form->field($model, 'status')->textInput() ?>-->

    <?= $form->field($model, 'group_id')->dropdownList(
    Group::find()->select(['name'])->indexBy('id')->column(),
    ['prompt'=>'Wybierz grupę'])?>

    <div class="form-group row">
        <div class="col-xs-6">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
        
    
    <?php ActiveForm::end(); ?>
<?= $form->errorSummary($model); ?>
</div>
