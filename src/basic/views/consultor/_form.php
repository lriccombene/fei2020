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
            <label for="apellido">Apellido :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="apellido_hint"  id="apellido" v-model="apellido" type="text" name="apellido" required>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="telefono">Telefono :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="telefono_hint"  id="telefono" v-model="telefono" type="text" name="telefono" required>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="email">Email :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="email_hint"  id="email" v-model="email" type="text" name="email" required>
        </div>
	</div>

    <div class="row">
		<div class="col-md-2">
            <label for="domicilio">Domicilio :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="domicilio_hint"  id="domicilio" v-model="domicilio" type="text" name="domicilio" required>
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
                      apellido:'<?php  echo ($model->apellido); ?>',
                      apellido_hint: 'ingrerse apellido',
                      telefono:'<?php  echo ($model->telefono); ?>',
                      telefono_hint: 'ingrerse telefono',
                      email:'<?php  echo ($model->email); ?>',
                      email_hint: 'ingrerse email',
                      domicilio:'<?php  echo ($model->domicilio); ?>',
                      domicilio_hint: 'ingrerse domicilio'
                    }
                   
                  })

</script>