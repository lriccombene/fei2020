<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Residuos */

$this->title = 'Crear Residuos';
$this->params['breadcrumbs'][] = ['label' => 'Residuos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residuos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
