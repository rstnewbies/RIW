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
$this->params['breadcrumbs'][] = $this->title;

$completeTasksIds = CompleteTask::find()->where(['group_id' => Yii::$app->user->identity->group_id])->select('task_id')->asArray()->all();
$unCompletedTasks = new ActiveDataProvider([
            'query' => Task::find()->where(['not in', 'id', $completeTasksIds]),
        ]);
$completedTasks = new ActiveDataProvider([
	'query' => Task::find()->where(['in', 'id', $completeTasksIds]),
]);
?>

<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>  <br><br>

<div class="task-view uncomplete-task-view">

    <h2>Lista nieukończonych zadań</h2>

    <?= GridView::widget([
	
        'dataProvider' => $unCompletedTasks,
        'columns' => [    
            'title',
            'text:ntext',
            'score',
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
        ],
    ]); ?>
</div>



