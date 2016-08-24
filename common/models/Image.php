<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property string $name
 * @property integer $score_sum
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'score_sum'], 'required'],
            [['score_sum'], 'integer'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'score_sum' => 'Score Sum',
        ];
    }
}
