<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consultor */

$this->title = 'Crear Consultor';
$this->params['breadcrumbs'][] = ['label' => 'Consultores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
