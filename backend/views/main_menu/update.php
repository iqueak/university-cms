<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainMenu */

$this->title = 'Update Main Menu: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Main Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
