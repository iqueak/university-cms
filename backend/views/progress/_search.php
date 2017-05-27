<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProgressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'lessons_type') ?>

    <?php // echo $form->field($model, 'date_eval') ?>

    <?php // echo $form->field($model, 'work_id') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
