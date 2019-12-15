<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GoodGroup */

$this->title = 'Новая группа';
$this->params['breadcrumbs'][] = ['label' => 'Группы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
