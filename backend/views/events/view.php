<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'author_id',
            'organizer',
            'category_id',
            'title',
            'slug',
            'summary:ntext',
            'content:ntext',
            'image_path',
            [
                'attribute'=>'image',
                'label'=> 'Post Picture',
                'value'=> 'http://y2aa-frontend.dev/img/' . $model->image_path,
                'format'=>['image',['width'=>100, 'height'=>100]]
            ],
            'status',
            'event_date',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
