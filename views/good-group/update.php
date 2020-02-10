<?php

use yii\helpers\Html;

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Группы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="good-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
