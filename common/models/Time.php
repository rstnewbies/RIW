<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "time".
 *
 * @property integer $id
 * @property integer $status
 * @property string $end_time
 */
class Time extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['end_time'], 'required'],
            [['status'], 'integer',],
            [['end_time'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'end_time' => 'End Time',
        ];
    }
    
    public static function getEndTime()
    {
        return static::findOne(['id' => 1])->end_time;
    }

}
