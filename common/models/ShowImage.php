<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "show_image".
 *
 * @property integer $id
 * @property integer $show_me_image
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
            [['show_me_image'], 'required'],
            [['show_me_image'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'show_me_image' => 'Show Me Image',
        ];
    }
}
