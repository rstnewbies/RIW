<?php

namespace backend\controllers;
use common\models\ShowImage;

class UnShowImageController extends \yii\web\Controller
{
		public function behaviors()
    {
        return [
			'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
	
    public function actionIndex()
    {   
        ShowImage::deleteAll();
        return $this->render('index');
    }

}
