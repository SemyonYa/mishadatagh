<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstallItem */

$this->title = 'Новый экземпляр';
$this->params['breadcrumbs'][] = ['label' => 'Установка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="install-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
