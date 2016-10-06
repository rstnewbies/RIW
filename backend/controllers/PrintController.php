<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Task;
use yii\data\ActiveDataProvider;


class PrintController extends Controller
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
    

    
   public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
   
    public function actionDoneTaskView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
