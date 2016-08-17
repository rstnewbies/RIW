<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complete_task".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $task_id
 */
class CompleteTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complete_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'task_id'], 'required'],
            [['group_id', 'task_id'], 'integer'],
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
            'task_id' => 'Task ID',
        ];
    }
}
