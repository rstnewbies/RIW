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
            return '4Oa6NgI7CnFvjI9gvaZCJH35C.jpg'; 
        }
        
        //premium task
        if(Task::find()->where(['score'=>5])->one()){
        $premium = Task::find()->where(['score'=>5])->one();
        $complete_premium = CompleteTask::find()->where(['task_id'=>$premium->id])->count();
        if($complete_premium>=2){
            return '4Oa6NgI7CnFvjI9gvaZCJH35C.jpg'; 
        }
        }
        
        $allScore = (int)$allScore;
        $images = Array(
            323 => 'G10M6BgYeOS1qKkPmPHGodrTz.jpg',
            314 => 'f3fDAUPDnoeDfYXhio50LbX1t.jpg',
            305 => '7ui2z3MGpYVsxP0d1AuL3SAJJ.jpg',
            296 => 'C3rbE62FnntqGp3cLl3sBYDme.jpg',
            287 => 'sAnsTnMgbAxvEGOqsTJMbFkR6.jpg',
            278 => 'SepC5MbdM88qHNczFQNLvgUMj.jpg',
            269 => 'j1d8NoFlznnCJUXzDxrBnTuf4.jpg',
            260 => 'QPMNMj1CARN1JEJlW1KoV2F7y.jpg',
            251 => 'qrib7deLQlaRWw3O33yfTXgcc.jpg',
            242 => '7NyAJ0RpbgpC2IBvCipwg3C32.jpg',
            233 => 'QU9NlbqEesgP0BFsL1mR9cguP.jpg',
            224 => 'fQZJlooINBCgQL6YzHycvrn17.jpg',
            215 => 'yLe2myhU7BQx8zRoGEAp6vtam.jpg',
            206 => 't0P14ShcNdGUMhZdyVeRax7tx.jpg',
            197 => 'wSsosHRxOuCvUikPpeEF63aA9.jpg',
            189 => '4ugEHjKdbM5wi1KTBPxpLZ15A.jpg',
            180 => 'pcHQJ5IaS7PLzaXYG6rjmmKDH.jpg',
            171 => 'HW69FLrioZ5Eh5EmW4eVqb4NX.jpg',
            162 => 'zKHMWQ1A49c1VzQxBU0lkZCsn.jpg',
            153 => 'xDIfZMMszNTBMvhtOMQv1Co5I.jpg',
            144 => 'iTFG4DyxlA3cNyZxavXp2DCvT.jpg',
            135 => '4cWHvq8E1wqTiCW9Plt1OklbM.jpg',
            126 => 'bj7hFWx7DgyMC34MRSXNtb0nA.jpg',
            117 => 'OB0by3hZ2NtJ4sl10lpUNB0j5.jpg',
            108 => 'MmAIFiVfoocb3anG48wttKg8O.jpg',
            99 => '0kmodUBA2231gxGLAHTxBc3Ao.jpg',
            90 => 'j3WQOnNkHFOyEb9vLqlqubETk.jpg',
            81 => 'hFN2CnR77GoMaGkHvMohrunD4.jpg',
            72 => 'Jl99FIVrOBcrYJKXLGeZUD9G3.jpg',
            63 => 'HeUS9u6Qauoh1Z7rvOHwHaXw6.jpg',
            54 => 'Y5YPyy0Bs4I2IrZ360Mnn83dF.jpg',
            45 => 'B1Mpk1YHoXH8T3pG10d7J0pu5.jpg',
            36 => 'JEPZaNYZPYOqw44Wydzv9Bidc.jpg',
            27 => 'WWK2gnrHUztDqDOU59O32Dll3.jpg',
            18 => 'tPXbh1AFDrvNO0sXIbiOMY62B.jpg',
            9 => '9m7SDytXyodQ9YvCSZXKy7l3Q.jpg',

        );
        
        foreach($images as $score => $image){
            if($allScore >= $score){
                return $image;
            }
        }
        
        return 'b2zFCtN33BihP0J7HG04PZTXJ.jpg';
    }
}
