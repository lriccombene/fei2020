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

<div class="area-form">



<form  id="app"   @submit="checkForm"   action="http://127.0.0.1:8000/apv1/area/create"   method="post">

  <p v-if="errors.length">
    <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">{{ errors }}</li>
    </ul>
  </p>

  <p>
    <label for="nombre">Nombre</label>
    <input id="nombre" v-model="nombre" type="text" name="nombre">
  </p>

  <p>
    <label for="Descripcion">Descripcion</label>
    <input  id="descripcion" v-model="descripcion" type="text" name="descripcion">
  </p>
  <p>
    <input type="submit" value="Enviar">
  </p>

</form>


<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                    errors:[],
                    nombre:null,
                    descripcion:null,
                    },
  methods:{
    checkForm:function(e) {
      if(this.descripcion && this.nombre) return true;
        this.errors = [];
      if(!this.nombre) this.errors.push("Nombre es requerdio.");
      e.preventDefault();
    }
  }
})

</script>