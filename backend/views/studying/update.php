<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Studying */

$this->title = 'Update Studying: ' . $model->group_id;
$this->params['breadcrumbs'][] = ['label' => 'Studyings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_id, 'url' => ['view', 'group_id' => $model->group_id, 'subject_id' => $model->subject_id, 'teacher_id' => $model->teacher_id, 'lessons_type' => $model->lessons_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="studying-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
