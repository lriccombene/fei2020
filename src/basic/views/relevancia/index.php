<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelevanciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relevancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relevancia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Relevancia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
