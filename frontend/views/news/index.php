<?php
/* @var $this yii\web\View */
/* @var $news yii\data\ActiveDataProvider */
/* @var $post common\models\News */
?>
    <?php foreach ($news as $post): ?>
        <a href="" class="news-item">
            <img src="img/news_bg.png" alt="" class="img">
            <div class="title"><?= $post->title ?></div>
            <div class="little"><?= $post->summary ?></div>
        </a>
    <?php endforeach; ?>
