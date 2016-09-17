<?php

namespace common\models;


use Yii;
use \common\models\Code;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 */
class Task extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'score'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['score'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'score' => 'Score',
            'image' => 'Image',
        ];
    }
    
    public static function getTask($id){
          return static::findOne('id' == $id);
    }
    
    public static function getTitle(){
        return $this->title;
    }
    
    
    
    public function afterSave($insert){
    if (parent::beforeSave($insert)) {
        //this execute only with insert new record to task table, never execute when update or something
        $length = rand(6, 8);
        $randomString = Yii::$app->getSecurity()->generateRandomString($length);
        $code = new Code();
        $code->code = $randomString;
        $code->task_id = $this->id;
        $code->save();
        
        return true;
    } else {
          return false;
    }
   }
   
   public function beforeDelete(){
        if (parent::beforeDelete()) {
        //this delete code when someone delete task
        Code::deleteAll(['task_id' => $this->id]);
        return true;
    } else {
        return false;
    }
   }
  
}
