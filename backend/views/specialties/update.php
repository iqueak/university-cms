<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Specialties */

$this->title = 'Update Specialties: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Specialties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specialties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
