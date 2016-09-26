<?php

namespace backend\controllers;

use Yii;
use common\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{
    /**
     * @inheritdoc
     */
    
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //get the instance of uploaded file;
            $imageName = $model->id;
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file!=null){
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            // save the path in the db column
            $model->image = 'uploads/'.$imageName.'.'.$model->file->extension;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionBonus()
    {
        $premium_show = new \common\models\PremiumTaskStatus();
        $premium_show->id = 1;
        $premium_show->status = 1;
        $premium_show->save();
        return $this->render('bonus');
    }
    
    public function actionUnBonus()
    {
        $premium_show = \common\models\PremiumTaskStatus::find()->where(['id'=>1])->one();
        $premium_show->delete();
        return $this->render('unBonus');
    }
 
    public function actionWroclaw()
    {
        if(\common\models\TaskZoneStatus::find()->where(['id'=>'1'])->one()){
            $task_zone_status = \common\models\TaskZoneStatus::find()->where(['id'=>'1'])->one();
        }else{
            $task_zone_status =  new \common\models\TaskZoneStatus();
            $task_zone_status->id = 1;
        }
        $task_zone_status->status = 'WRO';
        $task_zone_status->save();
        return $this->render('wroclaw');
    }
    
    public function actionKatowice()
    {
        if(\common\models\TaskZoneStatus::find()->where(['id'=>'1'])->one()){
            $task_zone_status = \common\models\TaskZoneStatus::find()->where(['id'=>'1'])->one();
        }else{
            $task_zone_status =  new \common\models\TaskZoneStatus();
            $task_zone_status->id = 1;
        }
        $task_zone_status->status = 'KAT';
        $task_zone_status->save();
        return $this->render('katowice');
    }
}
