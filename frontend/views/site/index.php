<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
use \common\models\User;
use \common\models\Task;
use \common\models\CompleteTask;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use common\models\Group;

$this->title = 'RST Kompas';
$loggedUser = Yii::$app->user->identity;

$completeTasksIds = CompleteTask::find()->where(['group_id' => $loggedUser->group_id])->select('task_id')->asArray()->all();
$task_zone = \common\models\TaskZoneStatus::find()->where(['id'=>'1'])->one()->status;
$allGroup= new ActiveDataProvider([
    'query' => Group::find()->where('id>0')->orderBy('score DESC'),
 ]);

$completedIds = Array();
foreach($completeTasksIds as $task){
	$completedIds[] = $task['task_id'];
}

$dataProvider = new ActiveDataProvider([
    'query' => Task::find()->where(['not in', 'id', $completedIds])->andWhere(['<>','score','5'])->andWhere(['=','zone',$task_zone])->limit(5),
]);
?>
<div class="site-index">
    <div class="jumbotron">
<!-- LOGO -->        
    <div class="row">
        <img src="rst_logo.png" class="img-responsive">
    </div>
<br>
<!-- Timer -->      
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
        
<!-- Button -->        
        <div class="row">
            <div class ="kafelek col-xs-12">
             <a href = "<?php  echo Url::toRoute('image/index')?>" class= "col-xs-4 text-center obraz-btn " >    
                <t class = "obraz-text">Obraz</t>
             </a>   
            <a href = "<?php  echo Url::toRoute('code/reader')?>" class= "col-xs-4 text-center qr-btn" >
                <t class = "text-6vw">Kody</t>
            </a>
            <a href = "<?php echo Url::toRoute('site/info')?>" class="col-xs-4 text-center info-btn">
                <t class = "text-6vw">Info</t>
            </a>
            </div>
        </div>

<!-- Tasks -->
        <div class="row">
            <div class="col-xs-12 text-center kafelek task-view">
        	<h2>Lista Nieukończonych Tasków</h2>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [ 
                        'title',
                        [   
                            'label' => 'Link do zadania',
                            'format' => 'raw',
                            'value' => function($dataProvider){
                                return Html::a("Link do zadania", ['task/view', 'id' => $dataProvider->id]);
                            },
                        ],
                        ],]); ?>
                <?php echo Html::a("Pełna lista Tasków", ["task/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>
            </div>
        </div>

<!-- Score board -->
        <div class="row">
          <div class = "col-xs-12 text-center kafelek task-view">
              <h2>Wyniki</h2>  
              <?= GridView::widget([   
                    'dataProvider' => $allGroup,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        'score',
                        ],]); ?>
          </div>
        </div>
</div>
    
<!-- Lider voting -->    
    <?php
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

<!-- Premium task alert -->
    <?php
    if(Task::find()->where(['score'=>5])->one()){
        $premium_task_id = Task::find()->where(['score'=>5])->one()->id;
        $premium_status = \common\models\PremiumTaskStatus::find()->where(['id'=>1])->count();
        if($premium_status>=1){
            Modal::begin([
                'header'=>'Bonusowe zadanie zostało dodane.',
                'id'=>'modal',
                'size'=>'modal-lg',
            ]);
            echo"<h1 class='jumbotron'>";
            echo"W twojej okolicy pojawiło się epickie specjalne zadanie <br>";
            echo Html::a("ZOBACZ JE", ['task/view','id'=>$premium_task_id], ['class' => '']);        
            echo"</h1>"; 
            Modal::end(); 
        }
    }
    ?>

</div>