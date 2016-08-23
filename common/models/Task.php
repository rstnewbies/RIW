<?php

namespace common\models;

use Yii;

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
        ];
    }
    
    public static function getTask($id){
          return static::findOne('id' == $id);
    }
    
    public static function getTitle(){
        return $this->title;
    }
	
	public static function getUndoneTasks(){
		

	}
}
