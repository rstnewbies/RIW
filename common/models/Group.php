<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $group_id
 * @property string $name
 * @property integer $color
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'required'],
            [['color'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'name' => 'Name',
            'color' => 'Color',
        ];
    }
}
