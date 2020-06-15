<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MesaentradaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mesa de entrada';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesaentrada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Mesa de Entrada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fec',
            'fec_ingreso',
            'id_categoria',
            'id_tramite',
            //'descripcion:ntext',
            //'id_empresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
