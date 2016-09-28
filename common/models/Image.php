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
            return '4Oa6NgI7CnFvjI9gvaZCJH35C.png'; 
        }
        
        //premium task
        if(Task::find()->where(['score'=>5])->one()){
        $premium = Task::find()->where(['score'=>5])->one();
        $complete_premium = CompleteTask::find()->where(['task_id'=>$premium->id])->count();
        if($complete_premium>=2){
            return '4Oa6NgI7CnFvjI9gvaZCJH35C.png'; 
        }
        }
        
        $allScore = (int)$allScore;
        $images = Array(
            250 => 'G10M6BgYeOS1qKkPmPHGodrTz.png',
            243 => 'f3fDAUPDnoeDfYXhio50LbX1t.png',
            236 => '7ui2z3MGpYVsxP0d1AuL3SAJJ.png',
            229 => 'C3rbE62FnntqGp3cLl3sBYDme.png',
            222 => 'sAnsTnMgbAxvEGOqsTJMbFkR6.png',
            215 => 'SepC5MbdM88qHNczFQNLvgUMj.png',
            208 => 'j1d8NoFlznnCJUXzDxrBnTuf4.png',
            201 => 'QPMNMj1CARN1JEJlW1KoV2F7y.png',
            194 => 'qrib7deLQlaRWw3O33yfTXgcc.png',
            187 => '7NyAJ0RpbgpC2IBvCipwg3C32.png',
            180 => 'QU9NlbqEesgP0BFsL1mR9cguP.png',
            173 => 'fQZJlooINBCgQL6YzHycvrn17.png',
            166 => 'yLe2myhU7BQx8zRoGEAp6vtam.png',
            159 => 't0P14ShcNdGUMhZdyVeRax7tx.png',
            152 => 'wSsosHRxOuCvUikPpeEF63aA9.png',
            145 => '4ugEHjKdbM5wi1KTBPxpLZ15A.png',
            138 => 'pcHQJ5IaS7PLzaXYG6rjmmKDH.png',
            131 => 'HW69FLrioZ5Eh5EmW4eVqb4NX.png',
            124 => 'zKHMWQ1A49c1VzQxBU0lkZCsn.png',
            117 => 'xDIfZMMszNTBMvhtOMQv1Co5I.png',
            110 => 'iTFG4DyxlA3cNyZxavXp2DCvT.png',
            103 => '4cWHvq8E1wqTiCW9Plt1OklbM.png',
            96 => 'bj7hFWx7DgyMC34MRSXNtb0nA.png',
            89 => 'OB0by3hZ2NtJ4sl10lpUNB0j5.png',
            82 => 'MmAIFiVfoocb3anG48wttKg8O.png',
            75 => '0kmodUBA2231gxGLAHTxBc3Ao.png',
            68 => 'j3WQOnNkHFOyEb9vLqlqubETk.png',
            61 => 'hFN2CnR77GoMaGkHvMohrunD4.png',
            54 => 'Jl99FIVrOBcrYJKXLGeZUD9G3.png',
            47 => 'HeUS9u6Qauoh1Z7rvOHwHaXw6.png',
            40 => 'Y5YPyy0Bs4I2IrZ360Mnn83dF.png',
            33 => 'B1Mpk1YHoXH8T3pG10d7J0pu5.png',
            26 => 'JEPZaNYZPYOqw44Wydzv9Bidc.png',
            19 => 'WWK2gnrHUztDqDOU59O32Dll3.png',
            12=> 'tPXbh1AFDrvNO0sXIbiOMY62B.png',
            5=> '9m7SDytXyodQ9YvCSZXKy7l3Q.png',

        );
        
        foreach($images as $score => $image){
            if($allScore >= $score){
                return $image;
            }
        }
        
        return 'b2zFCtN33BihP0J7HG04PZTXJ.png';
    }
}
