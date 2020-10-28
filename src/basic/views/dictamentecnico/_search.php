<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DictamentecnicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictamentecnico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fec') ?>

    <?= $form->field($model, 'nro') ?>

    <?= $form->field($model, 'id_categoria') ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?php // echo $form->field($model, 'id_area') ?>

    <?php // echo $form->field($model, 'id_yacimiento') ?>

    <?php // echo $form->field($model, 'id_tipodictamen') ?>

    <?php // echo $form->field($model, 'id_tipotrabajo') ?>

    <?php // echo $form->field($model, 'detalle') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
