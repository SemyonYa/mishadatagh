<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstallItemGood */

$this->title = 'Update Install Item Good: ' . $model->install_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Install Item Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->install_item_id, 'url' => ['view', 'install_item_id' => $model->install_item_id, 'good_id' => $model->good_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="install-item-good-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
