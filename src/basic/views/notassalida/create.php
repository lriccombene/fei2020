<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notassalida */

$this->title = 'Crear Notassalida';
$this->params['breadcrumbs'][] = ['label' => 'Notas de salida', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notassalida-create">

    <h1>Crear Notas de Salida</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
