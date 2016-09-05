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

$this->title = 'RST Compas';
$loggedUser = Yii::$app->user->identity;

$completeTasksIds = CompleteTask::find()->where(['group_id' => $loggedUser->group_id])->select('task_id')->asArray()->all();

$completedIds = Array();
foreach($completeTasksIds as $task){
	$completedIds[] = $task['task_id'];
}

  $dataProvider = new ActiveDataProvider([
            'query' => Task::find()->where(['not in', 'id', $completedIds])->limit(5),
        ]);
?>
<div class="site-index">
    <div class="jumbotron">
        
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
             <a href = "<?php  echo Url::toRoute('image/index')?>" class= "col-xs-4 text-center cos-btn" >    
                <t>Obraz</t>
             </a>   
            <a href = "<?php  echo Url::toRoute('code/reader')?>" class= "col-xs-4 text-center qr-btn" >
                <t>Kody</t>
            </a>
            <a href = "<?php echo Url::toRoute('site/info')?>" class="col-xs-4 text-center info-btn">
                <t>Info</t>
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
                        'text:ntext',
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
            <div>
                Wyniki
            </div>
            <div>
                <?php
                $loggedUserGroupPosition = 0;
                $count = 1;
                $top_group = Group::find()->where('id>0')->orderBy('score DESC')->limit(4)->all();
                $allGroup = Group::find()->where('id>0')->orderBy('score DESC')->all();
                
                //count logged user group positon
                foreach( $allGroup as $group){
                    if($loggedUser->group_id === $group->id){
                        $loggedUserGroupPosition = $count;
                    }
                    $count ++;
                }
                
                $count = 1;
                
                //draw top 4 group
                foreach ($top_group as $group) { 
                echo "<div class='row'>"; 
                    echo "<div class = 'col-xs-3'></div>";
                    echo "<div class = 'col-xs-1 sb-position-".$count."'>";
                    echo "#".$count;
                    echo "</div>";
                    echo "<div class = 'col-xs-4 sb-name-".$count."'>";
                    echo $group->name;
                    echo "</div>";
                    echo "<div class = 'col-xs-1 sb-score-".$count."'>";
                    echo $group->score;
                    echo "pkt.";
                    echo "</div>";
                echo "</div>";
                    
                $count ++;
                }
                if($loggedUserGroupPosition > 4){
                    $loggedUserGroup = Group::findOne($loggedUser->group_id);
                    echo "<div class='row'>";    
                        echo "<div class = 'col-xs-3'></div>";
                        echo "<div class = 'col-xs-1 sb-position-5'>";
                        echo "#".$loggedUserGroupPosition;
                        echo "</div>";
                        echo "<div class = 'col-xs-4 sb-name-5'>";
                        echo $loggedUserGroup->name;
                        echo "</div>";
                        echo "<div class = 'col-xs-1 sb-score-5'>";
                        echo $loggedUserGroup->score;
                        echo "pkt.";
                        echo "</div>";
                    echo "</div>";
                    }
                ?>
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
   

</div>