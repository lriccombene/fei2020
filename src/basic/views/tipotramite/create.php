<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipotramite */

$this->title = 'Crear Tipotramite';
$this->params['breadcrumbs'][] = ['label' => 'Tipo tramite', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipotramite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
