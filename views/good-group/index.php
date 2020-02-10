<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Группы товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'description:ntext',
            // 'thickness_of',
            // 'category_id',
            //'img',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>


</div>
