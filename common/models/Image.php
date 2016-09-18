<?php

namespace common\models;

use Yii;
use common\models\Group;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $path
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
            [['path', 'score_sum'], 'required'],
            [['score_sum'], 'integer'],
            [['path'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'score_sum' => 'Score Sum',
        ];
    }
    
    public static function getImage($score){
        return Image::find()->where(['score_sum' => $score])->path;
    }
    
    public static function getCurrentImage($allScore = 0){
        $allScore = (int)$allScore;
        $images = Array(
            100 => '10.jpg',
            90 => '9.jpg',
            80 => '8.jpg',
            70 => '7.jpg',
            60 => '6.jpg',
            50 => '5.jpg',
            40 => '4.jpg',
            30 => '3.jpg',
            20 => '2.jpg',
            10 => '1.jpg'
        );
        
        foreach($images as $score => $image){
            if($allScore >= $score){
                return $image;
            }
        }
        return '0.jpg';
    }
}
