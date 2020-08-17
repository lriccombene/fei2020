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
    <form  id="app"   @submit.prevent="submitForm"   action="http://127.0.0.1:8000/apv1/area/create"   method="post">


    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nombre">Nombre :</label>
		</div>
		<div class="col-md-8">
            <input v-bind:placeholder="nombre_hint" id="nombre" v-model="nombre" type="text" name="nombre" required>
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
                      nombre:null,
                      nombre_hint: 'ingrerse nombre',
                      descripcion:null,
                      descripcion_hint: 'ingrerse descripcion',
                    },
                    computed:{
                      
                    },
                    methods:{
                      submitForm(){
                        //esto lo dejo como valdiar los datos en mi proyecto no lo utilizaria asi 
                        //queda a esperas que lleguemos a consumir la API
                        alert('submited: ' + this.nombre + ' ' + this.descripcion )
                      }
                    } 
                  })

</script>