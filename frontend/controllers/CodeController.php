<?php

namespace frontend\controllers;

use frontend\models\ReaderForm;
use Yii;
use common\models\User;
use yii\helpers\Html;

class CodeController extends \yii\web\Controller
{
	  public function behaviors()
    {
        return [
			'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');   
    }
   
    
    public function actionReader()
    {
        
        $leaderGroup = User::find()->where(['group_id' => Yii::$app->user->identity->group_id])->orderBy("leader_points DESC")->one();
        
        if($leaderGroup->id == Yii::$app->user->identity->id){
        $model = new ReaderForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->goBack();
        } else {
            return $this->render('reader', [
                'model' => $model,
            ]);
        }
        }
        else {
            return $this->render('notLeaderInfo');
        }
    }         
}
