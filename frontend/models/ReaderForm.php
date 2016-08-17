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
            [['code'],  \app\components\CodeValidator::className()],
        ];
    }
}
