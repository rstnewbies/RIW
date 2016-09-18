<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use \common\models\Task;
use \common\models\CompleteTask;
use \common\models\Group;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$group = Group::find()->where(['id' => Yii::$app->user->identity->group_id])->one();
$completeTasksIds = CompleteTask::find()->where(['group_id' => $group->id])->select('task_id')->asArray()->all();
$completedIds = Array();
foreach($completeTasksIds as $task){
	$completedIds[] = $task['task_id'];
}

$unCompletedTasks = new ActiveDataProvider([
            'query' => Task::find()->where(['not in', 'id', $completedIds]),
		]);
		
$completedTasks = new ActiveDataProvider([
	'query' => Task::find()->where(['in', 'id', $completedIds]),
		]);

?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div class="task-view uncomplete-task-view">

    <h2>Lista nieukończonych zadań</h2>
	
    <?= GridView::widget([
		//I create two list becouse PO tell to not show points per task in uncomplete task, but score must be show in complete task
        'dataProvider' => $unCompletedTasks,
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
            [
                'label'  => 'image',
                'attribute' => 'photo',
                'value' => function($dataProvider){
                return 'http://yii-backend.com/'.Task::getImagePath($dataProvider->id)->image;},
                'format' => ['image',['width'=>'50','height'=>'50']],
            ],
        ],
    ]); ?>
	
</div>
<br></br>
<div class="task-view">

    <h2>Lista ukończonych zadań</h2>

    <?= GridView::widget([
	
        'dataProvider' => $completedTasks,
        'columns' => [    
            'title',
            'text:ntext',
            'score',
            [   
                'label' => 'Link do zadania',
                'format' => 'raw',
                'value' => function($dataProvider){
                return Html::a("Link do zadania", ['task/view', 'id' => $dataProvider->id]);
                },
            ],
                        [
                'label'  => 'image',
                'attribute' => 'photo',
                'value' => function($dataProvider){
                return 'http://yii-backend.com/'.Task::getImagePath($dataProvider->id)->image;},
                'format' => ['image',['width'=>'50','height'=>'50']],
            ],
        ],
    ]); ?>
</div>



