<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstallItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="install-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'works')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recommendations')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'as_result')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->hiddenInput() ?>
    <img src="/web/images/<?= $model->img ?: 'fake.svg' ?>" class="img-preview" id="VikarImgPreview"data-toggle="modal" data-target="#VikarModal" onclick="LoadImageManager('install-item-img')" alt="Нужно выбрать другое изображение...">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
