<?php
/* @var $this yii\web\View */
/* @var $events yii\data\ActiveDataProvider */
/* @var $post common\models\Events */
?>

<?php foreach ($events as $i => $post): ?>
    <a class="event-item container" id="event-<?= $i ?>">
        <div class="event-col">
            <img src="img/event_bg.png" alt="" class="event-img">
            <div class="event-date"><?= date("d.m.y",strtotime($post->event_date)) ?></div>
        </div>
        <div class="event-col">
            <div href="" class="event-title"><?= $post->title ?></div>
        </div>
    </a>
<?php endforeach; ?>
