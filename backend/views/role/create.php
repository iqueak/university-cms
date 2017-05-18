<?php

/**
 * @var yii\web\View $this
 * @var common\models\AuthItem $model
 */

$this->title = Yii::t('acp', 'Create Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('acp', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success auth-item-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
