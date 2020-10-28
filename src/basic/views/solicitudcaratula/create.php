<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitudcaratula */

$this->title = 'Create Solicitudcaratula';
$this->params['breadcrumbs'][] = ['label' => 'Solicitudcaratulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudcaratula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
