<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
/* @var $this yii\web\View */
/* @var $model app\models\Actasinspeccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actasinspeccion-form">


    <form  id="app"   method="post">


    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nro">Nro :</label>
		</div>
		<div class="col-md-8">

            <input v-bind:placeholder="nro_hint" id="nro" v-model="nro" type="text" name="nro" required >
            
		</div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="fec">Fec :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="fec_hint"  id="fec" v-model="fec" type="date" name="fec">
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="localidad">Localidad :</label>
        </div>
        <div class="col-md-8">
        <select v-model="selected" required >
            <option v-for="option in localidades" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
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
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="motivo">Motivo :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_motivo" required >
            <option v-for="option in motivos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
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
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="motivo">Motivo :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_area" required >
            <option v-for="option in areas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="latitud">Latitud :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="latitud_hint"  id="latitud" v-model="latitud" type="text" name="latitud">
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="longitud">Longitud :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="longitud_hint"  id="longitud" v-model="longitud" type="text" name="longitud">
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
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrerse nro',
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrerse fec',
                        selected: '<?php  echo ($model->id_localidad); ?>',
                        localidades: [
                                { id: '1', nombre: 'Localidad1' },
                                { id: '2', nombre: 'Localidad2' },
                                { id: '3', nombre: 'Localidad3' }
                               ],
                        selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                        categorias: [
                                { id: '1', nombre: 'categoria1' },
                                { id: '2', nombre: 'categoria2' },
                                { id: '3', nombre: 'categoria3' }
                               ],
                        selected_motivo: '<?php  echo ($model->id_motivo); ?>',
                        motivos: [
                                { id: '1', nombre: 'motivo1' },
                                { id: '2', nombre: 'motivo2' },
                                { id: '3', nombre: 'motivo3' }
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
                        longitud: '<?php  echo ($model->longitud); ?>',
                        longitud_hint: 'ingrerse longitud',
                        latitud: '<?php  echo ($model->latitud); ?>',
                        latitud_hint: 'ingrerse latitud',

                    }
                   
                  })
</script>