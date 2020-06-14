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

<div class="area-form " >


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
            <label for="descripcion">Descripcion :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="descripcion_hint"  id="descripcion" v-model="descripcion" type="text" name="descripcion" >
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="razon_social">Razon Social :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="razon_social_hint"  id="razon_social" v-model="razon_social" type="text" name="razon_social" >
        </div>
	</div>

    <div class="row">
		<div class="col-md-2">
            <label for="contacto">Contacto :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="contacto_hint"  id="contacto" v-model="contacto" type="text" name="contacto" >
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="referente">Referente :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="referente_hint"  id="referente" v-model="referente" type="text" name="referente" >
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="consultor">Consultor :</label>
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
                      nombre: '<?php  echo ($model->nombre); ?>',
                      nombre_hint: 'ingrese nombre',
                      descripcion:'<?php  echo ($model->descripcion); ?>',
                      descripcion_hint: 'ingrese descripcion',
                      razon_social:'<?php  echo ($model->razon_social); ?>',
                      razon_social_hint: 'ingrese razon social',
                      contacto:'<?php  echo ($model->contacto); ?>',
                      contacto_hint: 'ingrese Contacto',
                      contacto:'<?php  echo ($model->contacto); ?>',
                      contacto_hint: 'ingrese Contacto',
                      referente:'<?php  echo ($model->contacto); ?>',
                      referente_hint: 'ingrese Referente',
                      selected: '4',
                      options: [
                                { id: '4', nombre: 'Ines' },
                                { id: '5', nombre: 'Tatiana' },
                                { id: '10', nombre: 'Walter' }
                               ]
                    }
                   
                  })

</script>


