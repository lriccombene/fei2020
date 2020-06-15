<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mesaentrada */

$this->title = 'Crear Mesa entrada';
$this->params['breadcrumbs'][] = ['label' => 'Mesa de entrada', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesaentrada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
