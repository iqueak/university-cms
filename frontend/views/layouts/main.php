<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
    <div class="wrapper container">
        <div class="site-logo row">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            <div class="university-link">
                LNU V.I DAHL
            </div>
        </div>
        <div class="menu row container">
            <a class="menu-item row" href="">Main page</a>
            <a class="menu-item row" href="">Information</a>
            <a class="menu-item row" href="">For abiturients</a>
            <a class="menu-item row" href="">For students</a>
            <a class="menu-item row" href="">Media</a>
            <a class="menu-item row" href="">Contact</a>
            <a class="menu-item row" href="">Search</a>
        </div>
        <div class="lang-menu row">
            <a class="lang-item lang-russian">Рус</a>
            <a class="lang-item lang-ukrainian">Укр</a>
            <a class="lang-item lang-english toggle">Eng</a>
            <a class="lang-item lang-deutschland">Deu</a>

        </div>

    </div>
</header>
<section class="content">
    <div class="wrapper">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</section>
<aside class="sidebar">
    <div class="wrapper">
        <div class="events-block">
            <a class="event-item" id="event-1">
                <img src="img/event_bg.png" alt="" class="event-img">
                <div href="" class="event-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, dolore dolorum! Beatae eaque est facere</div>
                <div class="event-data">28.01.2016</div>
            </a>
            <a class="event-item-alt" id="event-2">
                <img src="img/event_bg.png" alt="" class="event-img">
                <div href="" class="event-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, dolore dolorum! Beatae eaque est facere</div>
                <div class="event-data">28.01.2016</div>
            </a>
            <a class="event-item-alt" id="event-3">
                <img src="img/event_bg.png" alt="" class="event-img">
                <div href="" class="event-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, dolore dolorum! Beatae eaque est facere</div>
                <div class="event-data">28.01.2016</div>
            </a>
            <a class="event-item-alt" id="event-4">
                <img src="img/event_bg.png" alt="" class="event-img">
                <div href="" class="event-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, dolore dolorum! Beatae eaque est facere</div>
                <div class="event-data">28.01.2016</div>
            </a>
            <a class="event-item-alt" id="event-5">
                <img src="img/event_bg.png" alt="" class="event-img">
                <div href="" class="event-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, dolore dolorum! Beatae eaque est facere</div>
                <div class="event-data">28.01.2016</div>
            </a>
        </div>
    </div>
</aside>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
