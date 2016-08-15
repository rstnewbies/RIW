<?php

namespace frontend\controllers;

use frontend\models\ReaderForm;
use Yii;
use yii\bootstrap\Alert;

class CodeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionReader()
    {
        $model = new ReaderForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->goBack();
        } else {
            return $this->render('reader', [
                'model' => $model,
            ]);
        }
    }
}
