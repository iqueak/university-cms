<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Studying */

$this->title = $model->group_id;
$this->params['breadcrumbs'][] = ['label' => 'Studyings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studying-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'group_id' => $model->group_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'group_id' => $model->group_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type], [
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
            'subject_id',
            'teacher_id',
            'lessons_type',
            'lessons_hours',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
