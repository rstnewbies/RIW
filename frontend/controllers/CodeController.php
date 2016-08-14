<?php

namespace frontend\controllers;

use frontend\models\ReaderForm;

class CodeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionReader()
    {
        $model = new ReaderForm();
        return $this->render('reader', [
                'model' => $model,
            ]);
    }
}
