<?php

namespace backend\controllers;

use Yii;
use common\models\Events;
use backend\models\search\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
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
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if(!is_null($model->imageFile)){
                $model->imageName = time();
                $model->image_path = $model->imageFolder . $model->imageName . '.' . $model->imageFile->extension;
                if ($model->upload(Yii::getAlias($model->imageAlias) . $model->imagePath . $model->image_path)) {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if(!is_null($model->imageFile)){
                if(!is_null($model->image_path)){
                    //TODO: Проверка на отсутсвие файла
                    unlink(Yii::getAlias($model->imageAlias) . $model->imagePath . $model->image_path);
                }
                $model->imageName = time();
                $model->image_path = $model->imageFolder . $model->imageName . '.' . $model->imageFile->extension;
                if ($model->upload(Yii::getAlias($model->imageAlias) . $model->imagePath . $model->image_path)) {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id){
        $model = $this->findModel($id);
        if(!is_null($model->image_path)){
            //TODO: Проверка на отсутсвие файла
            unlink(Yii::getAlias($model->imageAlias) . $model->imagePath . $model->image_path);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
