<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

/* @var $blog_menu_items yii\data\ActiveDataProvider */
/* @var $blog_menu_item common\models\BlogMenuItems */
?>
<?php foreach ($blog_menu_items as $blog_menu_item): ?>
    <a class="menu-item row" href="<?= Url::to($blog_menu_item->url,true) ?>"><?= $blog_menu_item->title ?></a>
<?php endforeach; ?>
