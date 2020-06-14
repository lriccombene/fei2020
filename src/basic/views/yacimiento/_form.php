<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);

/* @var $this yii\web\View */
/* @var $model app\models\Yacimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yacimiento-form">

   

<form  id="app"   method="post">


<div class="container-fluid">
<div class="row">
    <div class="col-md-2">
        <label for="nombre">Nombre :</label>
    </div>
    <div class="col-md-8">

        <input v-bind:placeholder="nombre_hint" id="nombre" v-model="nombre" type="text" name="nombre" required >
        
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="Descripcion">Descripcion :</label>
    </div>
    <div class="col-md-8">
        <input v-bind:placeholder="descripcion_hint"  id="descripcion" v-model="descripcion" type="text" name="descripcion">
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <input type="submit" value="Enviar" class="btn btn-success">
    </div>
</div>

</form>
</div>

<script>
var app = new Vue({
                el:'#app',
                data:{
                  nombre: '<?php  echo ($model->nombre); ?>',
                  nombre_hint: 'ingrerse nombre',
                  descripcion:'<?php  echo ($model->descripcion); ?>',
                  descripcion_hint: 'ingrerse descripcion',
                }
               
              })

</script>

  
