<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
/* @var $this yii\web\View */
/* @var $model app\models\Enviosdocumentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enviosdocumentacion-form">
<form  id="app"   method="post">

<div class="container-fluid">

    <div class="row">
		<div class="col-md-2">
            <label for="fec">Fec :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="fec_hint"  id="fec" v-model="fec" type="date" name="fec">
            <span class="text-danger" v-if="errors.fec" >{{errors.fec}}</span>
        </div>
	</div>
	<div class="row">
		<div class="col-md-2">
            <label for="transporte">Nro :</label>
		</div>
		<div class="col-md-8">

            <input v-bind:placeholder="transporte_hint" id="transporte" v-model="transporte" type="text" name="transporte" required >
            
		</div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="relevancia">Relevancia :</label>
        </div>
        <div class="col-md-8">
        <select v-model="selected_relevancia" required >
            <option v-for="option in relevancias" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        </div>
	</div>
   
    <div class="row">
		<div class="col-md-2">
            <label for="detalle">Detalle :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="detalle_hint"  id="detalle" v-model="detalle" type="text" name="detalle">
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="archivo_urlnotificado">Archivo url notificado :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="archivo_urlnotificado_hint"  id="archivo_urlnotificado" v-model="archivo_urlnotificado" type="text" name="archivo_urlnotificado">
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="destino">Destino :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="destino_hint"  id="destino" v-model="destino" type="text" name="destino">
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="fec_notificado">Fec Notificado:</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="fec_notificado_hint"  id="fec_notificado" v-model="fec_notificado" type="date" name="fec_notificado">
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
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrerse fec',
                        transporte: '<?php  echo ($model->transporte); ?>',
                        transporte_hint: 'ingrerse transporte',
                        selected_relevancia: '<?php  echo ($model->id_relevancia); ?>',
                        relevancias: [
                                { id: '1', nombre: 'relevancia1' },
                                { id: '2', nombre: 'relevancia2' },
                                { id: '3', nombre: 'relevancia3' }
                               ],
                        detalle: '<?php  echo ($model->detalle); ?>',
                        detalle_hint: 'ingrerse detalle',
                        archivo_urlnotificado: '<?php  echo ($model->archivo_urlnotificado); ?>',
                        archivo_urlnotificado_hint: 'ingrese archivo url notificado',
                        destino: '<?php  echo ($model->destino); ?>',
                        destino_hint: 'ingrese destino',
                        fec_notificado: '<?php  echo ($model->fec_notificado); ?>',
                        fec_notificado_hint: 'ingrese fecha notificado',
                        errors: {},
                        id:'<?php  echo ($model->id); ?>'

                    }
                   
                  })
</script>
