<?php

namespace app\components;

use yii\validators\Validator;
use common\models\Code;
use \common\models\CompleteTask;
use Yii;

class CodeValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!Code::findByCode($model->$attribute)) {
            $this->addError($model, $attribute, 'Napewno dobrze wpisałeś ? Takiego kodu nie ma w bazie.');
        }  else {
            
            $code = Code::findByCode($model->$attribute);
            
            if(CompleteTask::findCompleteTask(Yii::$app->user->identity->group_id,$code->task_id)){
                $this->addError($model, $attribute, 'Już wpisałeś ten kod :)');
            }else{
                $complete_task = new CompleteTask();
                $complete_task->group_id = Yii::$app->user->identity->group_id;
                $complete_task->task_id = $code->task_id;
                return $complete_task->save() ? $complete_task : null;
            }
        }
    }
}