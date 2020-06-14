<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActasinspeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actas inspeccion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actasinspeccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Actas inspeccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nro',
            'fec',
            'id_localidad',
            'id_categoria',
            //'id_motivo',
            //'id_empresa',
            //'id_area',
            //'latitud',
            //'longitud',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
