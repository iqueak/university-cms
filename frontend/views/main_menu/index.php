<?php
/* @var $this yii\web\View */
/* @var $main_menu yii\data\ActiveDataProvider */
/* @var $menu_element common\models\MainMenu */
?>
<?php foreach ($main_menu as $menu_element): ?>
    <a class="menu-item row" href="<?= $menu_element->url ?>"><?= $menu_element->title ?></a>
<?php endforeach; ?>
