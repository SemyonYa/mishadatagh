<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstallItemGood */

$this->title = 'Create Install Item Good';
$this->params['breadcrumbs'][] = ['label' => 'Install Item Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="install-item-good-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
