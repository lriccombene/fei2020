<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Actasinspeccion */

$this->title = 'Actualizar Actas inspeccion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Actas inspeccion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actasinspeccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
