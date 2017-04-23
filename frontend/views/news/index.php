<?php
/* @var $this yii\web\View */
/* @var $news_items yii\data\ActiveDataProvider */
/* @var $post common\models\News */
var_dump($news)
?>
<div class="news-block">
    <?php foreach ($news as $post): ?>
        <a href="" class="news-item">
            <img src="img/news_bg.png" alt="" class="img">
            <div class="title"><?= $post->title ?></div>
            <div class="little"><?= $post->summary ?></div>
        </a>
    <?php endforeach; ?>
</div>
