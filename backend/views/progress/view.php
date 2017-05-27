<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Progress */

$this->title = $model->group_id;
$this->params['breadcrumbs'][] = ['label' => 'Progresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'group_id' => $model->group_id, 'student_id' => $model->student_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type, 'date_eval' => $model->date_eval, 'work_id' => $model->work_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'group_id' => $model->group_id, 'student_id' => $model->student_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type, 'date_eval' => $model->date_eval, 'work_id' => $model->work_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'group_id',
            'student_id',
            'subject_id',
            'teacher_id',
            'lessons_type',
            'date_eval',
            'work_id',
            'value',
            'description:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
