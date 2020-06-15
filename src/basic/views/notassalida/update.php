<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notassalida */

$this->title = 'Actualizar Notas de salida: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notas de salida', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notassalida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
