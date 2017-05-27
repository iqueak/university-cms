<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Studying */

$this->title = 'Create Studying';
$this->params['breadcrumbs'][] = ['label' => 'Studyings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studying-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
