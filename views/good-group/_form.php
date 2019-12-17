<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GoodGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="good-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thickness_of')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'img')->hiddenInput() ?>
    <img src="/web/images/<?= $model->img ?: 'fake.svg' ?>" class="img-preview" id="VikarImgPreview"data-toggle="modal" data-target="#VikarModal" onclick="LoadImageManager('goodgroup-img')" alt="Нужно выбрать другое изображение...">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
