<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'RST Compas';
?>
<div class="jumbotron">
    
    <div class="row">
        <h1>Znalazłeś kod ?</h1> 
        <h3>Sprawdź czy to ten :</h3>
    </div>
    
    <?php $form = ActiveForm::begin(); ?>
                      
                <?= $form->field($model, 'code')->textInput() ?>
                <div class="form-group">
                    <?= Html::submitbutton('Sprawdz', ['class' => 'btn btn-primary']) ?>
                </div>
        </div>
    <?php ActiveForm::end(); ?>
       
</div>



