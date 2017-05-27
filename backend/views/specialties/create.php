<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Specialties */

$this->title = 'Create Specialties';
$this->params['breadcrumbs'][] = ['label' => 'Specialties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
