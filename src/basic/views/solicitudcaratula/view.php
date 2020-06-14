<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
/* @var $this yii\web\View */
/* @var $model app\models\Solicitudcaratula */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud de Caratulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="solicitudcaratula-view">
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
            'fec',
            'extracto',
            'recibido',
        ],
    ]) ?>
</div>
<div id="app">

<table id="w0" class="table table-striped table-bordered detail-view">
    <tbody>
        <tr><th>ID</th><td>{{id}}</td></tr>
        <tr><th>fec</th><td>{{fec}}</td></tr>
        <tr><th>extracto</th><td>{{extracto}}</td></tr>
        <tr><th>recibido</th><td>{{recibido}}</td></tr>
    </tbody>
</table>
</div>
<script>
    var app = new Vue({
                el: '#app',
                data: {
                    id:'<?php  echo ($model->id); ?>',
                    fec: '<?php  echo ($model->fec); ?>',
                    extracto:'<?php  echo ($model->extracto); ?>', 
                    recibido: '<?php  echo ($model->recibio); ?>', 
                
                    }
                })
</script>