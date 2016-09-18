<?php

namespace backend\controllers;
use common\models\ShowImage;

class UnShowImageController extends \yii\web\Controller
{
    public function actionIndex()
    {   
        ShowImage::deleteAll();
        return $this->render('index');
    }

}
