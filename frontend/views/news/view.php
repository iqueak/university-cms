<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

/* @var $news yii\data\ActiveDataProvider */
/* @var $post common\models\News */
?>
<div class="news-view">
    <div class="news-header">
        <img src="<?= Url::to('img/' . $post->image_path,true) ?>" alt="" class="news-img">
    </div>
    <div class="news-content">
        <div class="news-title"><?= $post->title ?></div>
        <div class="news-date"><?= $post->created_at ?></div>
        <div class="news-text">
            <p><?= $post->content ?></p>
        </div>
    </div>
</div>
