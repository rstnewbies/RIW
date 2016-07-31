<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'RSTKompas';
?>
<div class="site-login">
    <div class="jumbotron">
    <h1>Kompas</h1>

    <!--<p>(OPIS)Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.(OPIS) </p>-->
    </div>
    <div class="col-lg-3"></div>
    <div class="col-lg-6 bot-margin">
        <div class="module form-module login-form">
          
            <h3 class="login-text">Start your adventure here! </h3>
            
            <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'form-height']); ?>
                      
                <?= $form->field($model, 'username')->textInput(['class'=>'','placeholder'=>'Email'])->label("") ?>

                <?= $form->field($model, 'password')->textInput(['class'=>'','placeholder'=>'Password','type'=>'password'])->label("") ?>
            
                <div class="form-group">
                    <button name="login-button">LOGIN</button>
                </div>
        </div>
            <?php ActiveForm::end(); ?>
                <div class="text-center col-lg-12">
                   <?= Html::a('I forgot password', ['site/request-password-reset']) ?>
                </div>
        </div>
        </div>
    </div>
