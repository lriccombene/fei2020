<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodictamen */

$this->title = 'Create Tipodictamen';
$this->params['breadcrumbs'][] = ['label' => 'Tipodictamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipodictamen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
