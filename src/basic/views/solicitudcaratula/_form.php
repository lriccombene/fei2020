<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitudcaratula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitudcaratula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fec')->textInput() ?>

    <?= $form->field($model, 'extracto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recibido')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
