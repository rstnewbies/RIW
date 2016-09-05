<?php

namespace frontend\controllers;

use common\models\Task;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class ImageController extends Controller
{
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