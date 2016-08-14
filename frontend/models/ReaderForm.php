<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Code;

class ReaderForm extends Model
{
    public $code;
    
    public function rules()
    {
        return [
            [['code'],'required'],
            [['code'],'validatePassword'],
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if ($this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
}
