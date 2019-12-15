<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InstallItemGood */

$this->title = $model->install_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Install Item Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="install-item-good-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'install_item_id' => $model->install_item_id, 'good_id' => $model->good_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'install_item_id' => $model->install_item_id, 'good_id' => $model->good_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'install_item_id',
            'good_id',
            'quantity',
        ],
    ]) ?>

</div>
