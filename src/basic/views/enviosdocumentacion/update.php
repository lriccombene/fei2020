<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enviosdocumentacion */

$this->title = 'Actualizar Enviosdocumentacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Enviosdocumentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="enviosdocumentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
