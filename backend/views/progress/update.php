<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Progress */

$this->title = 'Update Progress: ' . $model->group_id;
$this->params['breadcrumbs'][] = ['label' => 'Progresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_id, 'url' => ['view', 'group_id' => $model->group_id, 'student_id' => $model->student_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type, 'date_eval' => $model->date_eval, 'work_id' => $model->work_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="progress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
