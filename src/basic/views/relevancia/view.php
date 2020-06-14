<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Relevancia */

use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Relevancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="relevancia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
        <tr><th>ID</th><td>1</td></tr>
        <tr><th>Nombre</th><td>{{nombre}}</td></tr>
        <tr><th>Descripcion</th><td>{{descripcion}}</td></tr>
    </tbody>
</table>
</div>
<script>



var app = new Vue({
el: '#app',
data: {
    id:1,
    nombre: '<?php  echo ($model->nombre); ?>',
    descripcion:'<?php  echo ($model->descripcion); ?>', 
    mostrar: true,
  
}


})
</script>