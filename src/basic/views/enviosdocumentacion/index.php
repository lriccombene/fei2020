<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnviosdocumentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Envios documentacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enviosdocumentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Envios documentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fec',
            'transporte',
            'id_relevancia',
            'detalle:ntext',
            //'archivo_urlnotificado',
            //'destino',
            //'fec_notificado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
