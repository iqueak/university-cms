<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlogMenuItems */

$this->title = 'Create Blog Menu Items';
$this->params['breadcrumbs'][] = ['label' => 'Blog Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-menu-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
