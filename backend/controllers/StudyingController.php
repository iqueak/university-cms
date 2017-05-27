<?php

namespace backend\controllers;

use Yii;
use common\models\Studying;
use backend\models\search\StudyingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudyingController implements the CRUD actions for Studying model.
 */
class StudyingController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Studying models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudyingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Studying model.
     * @param integer $group_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @return mixed
     */
    public function actionView($group_id, $subject_id, $teacher_id, $lessons_type)
    {
        return $this->render('view', [
            'model' => $this->findModel($group_id, $subject_id, $teacher_id, $lessons_type),
        ]);
    }

    /**
     * Creates a new Studying model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Studying();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Studying model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $group_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @return mixed
     */
    public function actionUpdate($group_id, $subject_id, $teacher_id, $lessons_type)
    {
        $model = $this->findModel($group_id, $subject_id, $teacher_id, $lessons_type);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Studying model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $group_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @return mixed
     */
    public function actionDelete($group_id, $subject_id, $teacher_id, $lessons_type)
    {
        $this->findModel($group_id, $subject_id, $teacher_id, $lessons_type)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Studying model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $group_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @return Studying the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_id, $subject_id, $teacher_id, $lessons_type)
    {
        if (($model = Studying::findOne(['group_id' => $group_id, 'subject_id' => $subject_id, 'teacher_id' => $teacher_id, 'lessons_type' => $lessons_type])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
