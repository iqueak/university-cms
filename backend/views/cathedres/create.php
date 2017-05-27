<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cathedres */

$this->title = 'Create Cathedres';
$this->params['breadcrumbs'][] = ['label' => 'Cathedres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cathedres-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
