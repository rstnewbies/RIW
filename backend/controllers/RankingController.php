<?php

namespace backend\controllers;

use Yii;
use common\models\Group;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


class RankingController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Group::find()->where('id>=0')->orderBy('score DESC'),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}

