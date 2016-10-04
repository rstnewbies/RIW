<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
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
            'id' => 'Group ID',
            'name' => 'Name',
            'color' => 'Color',
        ];
    }
	
	public function getScore(){
		return CompleteTask::find()->where(['group_id' => $this->id])->joinWith('task')->sum('task.score');
	}
        
        public function getColorName($number){
        switch ($number){
            case 1:
                return "Żółty";
            case 2:
                return "Niebieski";
            case 3:
                return "Zielony";
            case 4:
                return "Czerwony";
            case 5:
                return "Fioletowy";
            case 6:
                return "Pomarańczowy";
            case 7:
                return "Szary";
            case 8:
                return "Różowy";
            default:
                return "Nieokreślony";
            
        }
    }
}
