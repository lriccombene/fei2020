<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dictamentecnico */

$this->title = 'Create Dictamentecnico';
$this->params['breadcrumbs'][] = ['label' => 'Dictamentecnicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictamentecnico-create">

    <h1>Crear Dictamen Técnico</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
