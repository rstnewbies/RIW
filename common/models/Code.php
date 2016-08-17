<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "codes".
 *
 * @property integer $id
 * @property string $code
 * @property integer $task_id
 */
class Code extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'task_id'], 'required'],
            [['task_id'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['code'], 'string', 'max' => 255],
            [['code'], 'unique',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'task_id' => 'Task ID',
        ];
    }
    
    public static function findByCode($code){
        return static::findOne(['code' => $code]);
    }
}
