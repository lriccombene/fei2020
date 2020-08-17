<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodictamen */

$this->title = 'Crear Tipo dictamen';
$this->params['breadcrumbs'][] = ['label' => 'Tipo dictamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipodictamen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
