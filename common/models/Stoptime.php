<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stoptime".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $stop_time
 */
class Stoptime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stoptime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'stop_time'], 'required'],
            [['group_id', 'stop_time'], 'integer'],
            [['group_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'stop_time' => 'Stop Time',
        ];
    }
}
