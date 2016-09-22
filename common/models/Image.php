<?php

namespace common\models;

use Yii;
use common\models\Group;
use common\models\ShowImage;
use common\models\Task;
use common\models\CompleteTask;
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
        
        //Show image by dashboard
        $dash_show = ShowImage::find()->where(['show_me_image'=>1])->count();
        if($dash_show>=1){
            return '37.png'; 
        }
        
        //premium task
        $premium = Task::find()->where(['score'=>5])->one();
        $complete_premium = CompleteTask::find()->where(['task_id'=>$premium->id])->count();
        if($complete_premium>=2){
            return '37.png'; 
        }
        
        $allScore = (int)$allScore;
        $images = Array(
            250 => '36.png',
            243 => '35.png',
            236 => '34.png',
            229 => '33.png',
            222 => '32.png',
            215 => '31.png',
            208 => '30.png',
            201 => '29.png',
            194 => '28.png',
            187 => '27.png',
            180 => '26.png',
            173 => '25.png',
            166 => '24.png',
            159 => '23.png',
            152 => '22.png',
            145 => '21.png',
            138 => '20.png',
            131 => '19.png',
            124 => '18.png',
            117 => '17.png',
            110 => '16.png',
            103 => '15.png',
            96 => '14.png',
            89 => '13.png',
            82 => '12.png',
            75 => '11.png',
            68 => '10.png',
            61 => '9.png',
            54 => '8.png',
            47 => '7.png',
            40 => '6.png',
            33 => '5.png',
            26 => '4.png',
            19 => '3.png',
            12=> '2.png',
            5=> '1.png',

        );
        
        foreach($images as $score => $image){
            if($allScore >= $score){
                return $image;
            }
        }
        
        return '0.png';
    }
}
