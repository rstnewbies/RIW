<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "show_image".
 *
 * @property integer $id
 * @property integer $show
 */
class ShowImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'show_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'show'], 'integer'],
            [['show'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'show' => 'Show',
        ];
    }
}
