<?php

namespace backend\controllers;

use common\models\ShowImage;

class AutoShowImageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $showImage = new ShowImage();
        $showImage->show_me_image = true;
        $showImage->save();
        return $this->render('index');
    }

}
