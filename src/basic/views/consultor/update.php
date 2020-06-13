<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consultor */

$this->title = 'Actualizar Consultor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Consultores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualziar';
?>
<div class="consultor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
