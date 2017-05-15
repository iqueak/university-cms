<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

/* @var $news yii\data\ActiveDataProvider */
/* @var $latest_news yii\data\ActiveDataProvider */
/* @var $post common\models\News */
?>
    <div class="main-news-block">
        <ul class="bxslider-news">
            <?php foreach ($latest_news as $latest_post): ?>
                <li class="item">
                    <img style="" src="<?= Url::to('img/' . $latest_post->image_path,true) ?>" alt="" class="img">
                    <a href="<?= Url::to(['news/view', 'id' =>  $latest_post->id]) ?>" class="title"><?= $latest_post->title ?></a>
                    <div class="little"><?= $latest_post->summary ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="news-block">
    <?php foreach ($news as $post): ?>
        <a href="<?= Url::to(['news/view', 'id' =>  $post->id]) ?>" class="news-item">
            <img src="<?= Url::to('img/' . $post->image_path,true) ?>" alt="" class="img">
            <div class="title"><?= $post->title ?></div>
            <div class="little"><?= $post->summary ?></div>
        </a>
    <?php endforeach; ?>
    <div>

