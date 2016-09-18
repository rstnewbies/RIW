<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'RST Compas';
?>
<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>
<div class="jumbotron">
    
    <div class="row">
        <div class ="kafelek code">
        <h1>Znalazłeś kod ?</h1> 
        <h3>Sprawdź czy to ten :</h3>
       
    
    
    <?php $form = ActiveForm::begin(); ?>
                      
                <?= $form->field($model, 'code')->textInput() ?>
                <div class="form-group">
                    <?= Html::submitbutton('Sprawdz', ['class' => 'btn btn-primary']) ?>
                </div>
        
  
    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>



