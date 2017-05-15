<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

/* @var $events yii\data\ActiveDataProvider */
/* @var $lEvents yii\data\ActiveDataProvider */
/* @var $post common\models\Events */
?>

<ul class="bxslider-event main-events-block">
    <?php foreach ($lEvents as $post): ?>
    <li class="main-event-item">
        <a class="main-event-wrapper" id="">
            <img src="<?= Url::to('img/' . $post->image_path,true) ?>" alt="" class="event-img">
            <div href="" class="event-title"><?= $post->title ?></div>
            <div class="event-date"><?= date("d.m.y",strtotime($post->event_date)) ?></div>
        </a>
    </li>
    <?php endforeach; ?>
</ul>


<div class="events-block">
<?php foreach ($events as $i => $post): ?>
    <a class="event-item container" id="event-<?= $i ?>">
        <div class="event-col">
            <img style="" src="<?= Url::to('img/' . $post->image_path,true) ?>" alt="" class="event-img">
            <div class="event-date"><?= date("d.m.y",strtotime($post->event_date)) ?></div>
        </div>
        <div class="event-col">
            <div href="" class="event-title"><?= $post->title ?></div>
        </div>
    </a>
<?php endforeach; ?>
</div>
