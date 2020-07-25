<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relevancia */

$this->title = 'Actualizar Relevancia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Relevancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="relevancia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
