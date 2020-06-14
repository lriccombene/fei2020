<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
/* @var $this yii\web\View */
/* @var $model app\models\Tipotramite */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo tramite', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipotramite-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea borrar el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'descripcion',
        ],
    ]) ?>

</div>
<div id="app">

<table id="w0" class="table table-striped table-bordered detail-view">
    <tbody>
        <tr><th>ID</th><td>{{id}}</td></tr>
        <tr><th>Nombre</th><td>{{nombre}}</td></tr>
        <tr><th>Descripcion</th><td>{{descripcion}}</td></tr>
    </tbody>
</table>
</div>
<script>



    var app = new Vue({
    el: '#app',
    data: {
        id:'<?php  echo ($model->id); ?>',
        nombre: '<?php  echo ($model->nombre); ?>',
        descripcion:'<?php  echo ($model->descripcion); ?>', 
        mostrar: true,
    
    }


    })
</script>