<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Actasinspeccion */

$this->title = 'Crear Actas inspeccion';
$this->params['breadcrumbs'][] = ['label' => 'Actas inspeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actasinspeccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
