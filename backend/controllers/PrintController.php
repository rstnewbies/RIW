<?php

namespace backend\controllers;

use Yii;
use common\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


class PrintController extends Controller
{
   public function actionIndex()
    {   
        return $this->render('index');
    }
}