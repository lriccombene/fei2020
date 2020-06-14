<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DictamentecnicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dictamentecnicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictamentecnico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dictamentecnico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fec',
            'nro',
            'id_categoria',
            'id_empresa',
            //'id_area',
            //'id_yacimiento',
            //'id_tipodictamen',
            //'id_tipotrabajo',
            //'detalle:ntext',
            //'longitud',
            //'latitud',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
