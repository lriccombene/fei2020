<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enviosdocumentacion */

$this->title = 'Crear Envios documentacion';
$this->params['breadcrumbs'][] = ['label' => 'Envios documentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enviosdocumentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
