<?php

namespace app\components;

use yii\validators\Validator;
use common\models\Code;
use \common\models\CompleteTask;
use Yii;
use common\models\Task;
use common\models\Group;
use common\models\Stoptime;

class CodeValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
         $code = Code::findByCode($model->$attribute);
         $group = Group::findOne(['id'=>Yii::$app->user->identity->group_id]);
         
         $last_time = Stoptime::findOne(['group_id'=>$group->id]);
         if($last_time===null){
             $last_time = new Stoptime();
             $last_time->group_id = $group->id;
             $last_time->stop_time = time();
             $last_time->save();
         }
         
    if(time()-$last_time->stop_time < 5){
        $this->addError($model, $attribute, "Nie tak szybko, poczekaj chwilę.");
    }else{
        if ($code===null) {
            $this->addError($model, $attribute, "Napewno dobrze wpisałeś ? Takiego kodu nie ma w bazie.");
        }  else {  
            if(CompleteTask::findCompleteTask(Yii::$app->user->identity->group_id,$code->task_id)){
                $this->addError($model, $attribute, 'Już wpisałeś ten kod :)');
            }else{
                $task = Task::findOne(['id'=>$code->task_id]);
                
                $this->addError($model, $attribute, 'Kod zaakceptowany! Twoja drużyna zdobyła punkty!');
                $complete_task = new CompleteTask();
                $complete_task->group_id = $group->id;
                $complete_task->task_id = $code->task_id;
                $complete_task->time = date('D H:i:s');
                $complete_task->save() ? $complete_task : null;
                
                $group->score = $group->score + $task->score;
                $group->save();
            }
            
        }
        $last_time->stop_time = time();
        $last_time->update();
    }
    }
}