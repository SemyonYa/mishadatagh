<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstallItemGood */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="install-item-good-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'install_item_id')->textInput() ?>

    <?= $form->field($model, 'good_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
