<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
use common\models\User;
use \common\models\Task;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$this->title = 'RST Compas';
$dataProvider = new ActiveDataProvider([
    'query' => Task::find(),
    'pagination' => [
        'pageSize' => 40,
    ],]);
?>
<div class="site-index">
    <div class="jumbotron">
        <div class="row">
            <div class="col-lg-12 text-center kafelek time-arena ">
                <?php echo \russ666\widgets\Countdown::widget([
                    'datetime' => \common\models\Time::getEndTime(),
                    'format' => '%-D:%-H:%-M:%-S',
                    'events' => [
                        'finish' => 'function(){location.reload()}',
                    ],])?>
        </div>
        </div>
        
        <div class="row">
            <div class ="kafelek col-xs-12">
           <div class="col-xs-4 text-center cos-btn">
             <t>Cos</t>
           </div>
           <a href = "<?php  echo Url::toRoute('code/reader')?>" class= "col-xs-4 text-center qr-btn" >
             <t>Kody</t>
           </a>
           <a href = "<?php echo Url::toRoute('site/info')?>" class="col-xs-4 text-center info-btn">
             <t>Info</t>
           </a>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-12 text-center kafelek zadania-btn">
        	<h2>Lista Tasków</h2>
        	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [ 
            'title',
            'text:ntext',
            'score',
        ],
    ]); ?>
    <?php echo Html::a("Pełna lista Tasków", ["task/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

        </div>
        <div class="col-lg-12 text-center kafelek qr-btn">
            
        </div>
    </div>
</div>
    <?php
    $loggedUser = Yii::$app->user->identity;
    if($loggedUser->voting == 0){
        Modal::begin([
            'header'=>'Zagłosuj na lidera',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
        
        $groupUsers = User::find()->where(['group_id'=>$loggedUser->group_id])->with('groupUser')->all();
        
        echo "<div id='modalContent'></div>";
        foreach ($groupUsers as $user){
            
        echo Html::a($user->name." ".$user->last_name, ['leader', 'id' => $user->id], ['class' => 'btn btn-success leader-btn center-block']);        
        echo '<br>';
        }      
        Modal::end(); 
    }
        ?>
   

</div>

