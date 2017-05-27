<?php

namespace backend\controllers;

use Yii;
use common\models\Progress;
use backend\models\search\ProgressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgressController implements the CRUD actions for Progress model.
 */
class ProgressController extends Controller
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
     * Lists all Progress models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Progress model.
     * @param integer $group_id
     * @param integer $student_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @param string $date_eval
     * @param integer $work_id
     * @return mixed
     */
    public function actionView($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id),
        ]);
    }

    /**
     * Creates a new Progress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Progress();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id, 'student_id' => $model->student_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type, 'date_eval' => $model->date_eval, 'work_id' => $model->work_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Progress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $group_id
     * @param integer $student_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @param string $date_eval
     * @param integer $work_id
     * @return mixed
     */
    public function actionUpdate($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id)
    {
        $model = $this->findModel($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id, 'student_id' => $model->student_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type, 'date_eval' => $model->date_eval, 'work_id' => $model->work_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Progress model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $group_id
     * @param integer $student_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @param string $date_eval
     * @param integer $work_id
     * @return mixed
     */
    public function actionDelete($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id)
    {
        $this->findModel($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Progress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $group_id
     * @param integer $student_id
     * @param integer $subject_id
     * @param integer $teacher_id
     * @param string $lessons_type
     * @param string $date_eval
     * @param integer $work_id
     * @return Progress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_id, $student_id, $subject_id, $teacher_id, $lessons_type, $date_eval, $work_id)
    {
        if (($model = Progress::findOne(['group_id' => $group_id, 'student_id' => $student_id, 'subject_id' => $subject_id, 'teacher_id' => $teacher_id, 'lessons_type' => $lessons_type, 'date_eval' => $date_eval, 'work_id' => $work_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
