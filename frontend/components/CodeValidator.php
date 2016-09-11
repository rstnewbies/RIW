<?php

namespace app\components;

use yii\validators\Validator;
use common\models\Code;
use \common\models\CompleteTask;
use Yii;
use common\models\Task;
use common\models\Group;

class CodeValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
         $code = Code::findByCode($model->$attribute);
         $group = Group::findOne(['id'=>Yii::$app->user->identity->group_id]);


        if ($code===null) {
            $this->addError($model, $attribute, 'Napewno dobrze wpisałeś ? Takiego kodu nie ma w bazie.');
        }  else {  
            if(CompleteTask::findCompleteTask(Yii::$app->user->identity->group_id,$code->task_id)){
                $this->addError($model, $attribute, 'Już wpisałeś ten kod :)');
            }else{
                $task = Task::findOne(['id'=>$code->task_id]);
                
                $this->addError($model, $attribute, 'Kod zaakceptowany! Twoja drużyna zdobyła punkty!');
                $complete_task = new CompleteTask();
                $complete_task->group_id = $group->id;
                $complete_task->task_id = $code->task_id;
                $complete_task->save() ? $complete_task : null;
                
                $group->score = $group->score + $task->score;
                $group->save();
            }
        }
    }
}