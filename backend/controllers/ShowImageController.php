<?php

namespace backend\controllers;

use common\models\ShowImage;

class ShowImageController extends \yii\web\Controller
{
    public function actionIndex()
    {   
        $show = new ShowImage();
        $show->show = true;
        $show->save();
        return $this->render('index');
        
        
    }

}
