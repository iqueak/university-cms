<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EventsCategory */

$this->title = 'Create Events Category';
$this->params['breadcrumbs'][] = ['label' => 'Events Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
