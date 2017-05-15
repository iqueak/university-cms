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
<div class="preloader-back">
    <div class="preloader-wrapper">
        <div class="preloader"></div>
    </div>
</div>
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
            <?= isset($this->params['menu_render']) ? $this->params['menu_render'] : null?>
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
        
            <?= isset($this->params['events_render']) ? $this->params['events_render'] : null?>
    </div>
</aside>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
