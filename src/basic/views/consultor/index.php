<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Consultor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            'telefono',
            'email:email',
            //'domicilio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
