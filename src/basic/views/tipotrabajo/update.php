<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipotrabajo */

$this->title = 'Actualizar Tipo trabajo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo trabajo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipotrabajo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
