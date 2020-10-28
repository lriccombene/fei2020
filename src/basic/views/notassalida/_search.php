<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NotassalidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notassalida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fec_emision') ?>

    <?= $form->field($model, 'id_categoria') ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?= $form->field($model, 'detalle') ?>

    <?php // echo $form->field($model, 'notificado') ?>

    <?php // echo $form->field($model, 'fec_notificado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
