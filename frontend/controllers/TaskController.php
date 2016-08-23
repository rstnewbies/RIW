<?php

namespace frontend\controllers;

use Yii;
use common\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class TaskController extends Controller
{
   public function actionIndex()
    {
        

        return $this->render('index');
    }
}
