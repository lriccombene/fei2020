<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResiduosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Residuos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residuos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Residuos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'cuit',
            'tiporesiduo',
            'telefono',
            //'email:email',
            //'domicilio',
            'nro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
