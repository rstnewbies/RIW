<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Task;
use yii\data\ActiveDataProvider;


class PrintController extends Controller
{
   public function actionIndex()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find()->where('id>=0')->orderBy('score DESC'),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}