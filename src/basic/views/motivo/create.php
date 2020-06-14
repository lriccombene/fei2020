<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Motivo */

$this->title = 'Create Motivo';
$this->params['breadcrumbs'][] = ['label' => 'Motivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
