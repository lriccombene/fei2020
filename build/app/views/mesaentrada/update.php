<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mesaentrada */

$this->title = 'Actualizar Mesa de Entrada: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesa de Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesaentrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
