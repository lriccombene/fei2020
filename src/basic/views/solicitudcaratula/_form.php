<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
?>
<div class="solicitudcaratula-form">
<form  id="app"   method="post">
<div class="container-fluid">
<div class="row">
    <div class="col-md-2">
        <label for="fec">Fecha :</label>
    </div>
    <div class="col-md-8">

        <input  id="fec" v-model="nombre" type="date" name="fec" required >
        
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="extracto">Extracto :</label>
    </div>
    <div class="col-md-8">
        <input v-bind:placeholder="extracto_hint"  id="extracto" v-model="extracto" type="text" name="extracto" maxlength="350">
    </div>
</div>
<div class="row">
	<div class="col-md-2">
        <label for="recibido">Recibido :</label>
    </div>
    <div class="col-md-8">
        <select v-model="selected" required >
            <option v-for="option in options" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
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
                  fec: '<?php  echo ($model->fec); ?>',
                  nombre_hint: 'ingrerse nombre',
                  extracto:'<?php  echo ($model->extracto); ?>',
                  extracto_hint: 'ingrerse extracto',
                  selected: '1',
                  options: [
                                { id: '1', nombre: 'Enviado' },
                                { id: '2', nombre: 'Recibido' },
                                { id: '3', nombre: '------' }
                               ]
                    }
                               
              })

</script>
