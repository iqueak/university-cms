<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlogMenuItems */

$this->title = 'Update Blog Menu Items: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blog Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-menu-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
