<?php

namespace backend\controllers;
use common\models\ShowImage;

class ShowImageController extends \yii\web\Controller
{
    public function actionIndex()
    {   
        $show = new ShowImage();
        $show->show_me_image = 1;
        $show->save();
        return $this->render('index');
    }

}
