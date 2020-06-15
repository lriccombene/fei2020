<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotassalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notas de salida';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notassalida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Notas de salida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fec_emision',
            'id_categoria',
            'id_empresa',
            'detalle:ntext',
            //'notificado',
            //'fec_notificado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
