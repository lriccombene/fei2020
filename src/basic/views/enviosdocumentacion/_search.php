<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnviosdocumentacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enviosdocumentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fec') ?>

    <?= $form->field($model, 'transporte') ?>

    <?= $form->field($model, 'id_relevancia') ?>

    <?= $form->field($model, 'detalle') ?>

    <?php // echo $form->field($model, 'archivo_urlnotificado') ?>

    <?php // echo $form->field($model, 'destino') ?>

    <?php // echo $form->field($model, 'fec_notificado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
