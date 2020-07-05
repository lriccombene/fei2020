<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

/* @var $this yii\web\View */
/* @var $model app\models\Dictamentecnico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictamentecnico-form">
  


  <div id="app"class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nro">Nro :</label>
		</div>
		<div class="col-md-8">

            <input v-bind:placeholder="nro_hint" id="nro" v-model="nro" type="text" name="nro" required >
            <span class="text-danger" v-if="errors.nro" >{{errors.nro}}</span>
		</div>
	</div>
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
            <label for="categoria">Categoria :</label>
        </div>
        <div class="col-md-8">
        <select v-model="selected_categoria" required >
            <option v-for="option in categorias" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.categoria" >{{errors.categoria}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="empresa">Empresa :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_empresa" required >
            <option v-for="option in empresas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.empresa" >{{errors.empresa}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="area">Area :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_area" required >
            <option v-for="option in areas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.area" >{{errors.area}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="yacimiento">Yacimiento :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_yacimiento" required >
            <option v-for="option in yacimientos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.yacimiento" >{{errors.yacimiento}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="tipodictamen">Tipo dictamen:</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_tipodictamen" required >
            <option v-for="option in tipodictamenes" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.tipodictamen" >{{errors.tipodictamen}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="tipotrabajo">Tipo trabajo:</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_tipotrabajo" required >
            <option v-for="option in tipotrabajos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.tipotrabajo" >{{errors.tipotrabajo}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="detalle">Detalle :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="detalle_hint"  id="detalle" v-model="detalle" type="text" name="detalle">
            <span class="text-danger" v-if="errors.detalle" >{{errors.detalle}}</span>
        </div>
	</div>

    <div class="row">
		<div class="col-md-2">
            <label for="latitud">Latitud :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="latitud_hint"  id="latitud" v-model="latitud" type="text" name="latitud">
            <span class="text-danger" v-if="errors.latitud" >{{errors.latitud}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="longitud">Longitud :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="longitud_hint"  id="longitud" v-model="longitud" type="text" name="longitud">
            <span class="text-danger" v-if="errors.longitud" >{{errors.longitud}}</span>
        </div>
	</div>


    <div class="row">
		<div class="col-md-2">
            <button v-if="!id"  v-on:click="add()"  type ="button"  class="btn btn-success">Enviar</button>
            <button v-if="id" v-on:click ="edit(id)" type ="button" class="btn btn-warning" >Actualizar</button>
        </div>
    </div>

    </div>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrerse nro',
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrerse fec',
                        selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                        categorias: [
                                { id: '1', nombre: 'categoria1' },
                                { id: '2', nombre: 'categoria2' },
                                { id: '3', nombre: 'categoria3' }
                               ],
                        selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                        empresas: [
                                { id: '1', nombre: 'empresa1' },
                                { id: '2', nombre: 'empresa2' },
                                { id: '3', nombre: 'empresa3' }
                               ],
                        selected_area: '<?php  echo ($model->id_area); ?>',
                        areas: [
                                { id: '1', nombre: 'area1' },
                                { id: '2', nombre: 'area2' },
                                { id: '3', nombre: 'area3' }
                               ],
                        selected_yacimiento: '<?php  echo ($model->id_yacimiento); ?>',
                        yacimientos: [
                                { id: '1', nombre: 'yacimiento1' },
                                { id: '2', nombre: 'yacicmiento2' },
                                { id: '3', nombre: 'yacimiento3' }
                               ],
                        selected_tipodictamen: '<?php  echo ($model->id_tipodictamen); ?>',
                        tipodictamenes: [
                                { id: '1', nombre: 'tipodictamen1' },
                                { id: '2', nombre: 'tipodictamen2' },
                                { id: '3', nombre: 'tipodictamen3' }
                               ],
                        selected_tipotrabajo: '<?php  echo ($model->id_tipotrabajo); ?>',
                        tipotrabajos: [
                                { id: '1', nombre: 'tipotrabajo1' },
                                { id: '2', nombre: 'tipotrabajo2' },
                                { id: '3', nombre: 'tipotrabajo3' }
                               ], 
                        detalle: '<?php  echo ($model->detalle); ?>',
                        detalle_hint: 'ingrerse detalle',
                        longitud: '<?php  echo ($model->longitud); ?>',
                        longitud_hint: 'ingrerse longitud',
                        latitud: '<?php  echo ($model->latitud); ?>',
                        latitud_hint: 'ingrerse latitud',

                    }
                   
                  })
</script>