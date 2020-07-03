<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>

<div class="area-form " >


<form  >
 <div id="app" >

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
            <input v-bind:placeholder="email_hint"  id="email" v-model="email" type="email" name="email" required>
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
  </div>
</form>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                        id:'',
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
                        errors: {},

                    },  // define methods under the `methods` object
                    methods: {
                      normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                      },
                      addArea: function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           axios.post('/apv1/area',params)
                              .then(function (response) {
                                  // handle success
                                  console.log(response.data);
                                  alert('Los datos fueron guardados');

                              })
                              .catch(function (error) {
                                  // handle error
                                  console.log(error.response.data);
                                  self.errors = self.normalizeErrors(error.response.data);
                              })
                              .then(function () {
                                  // always executed
                              });
                      },
                      editArea:function(id){
                        
                        var self = this;
                        const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                          // alert(params);
                           axios.patch('/apv1/area'+'/'+id,params)
                              .then(function (response) {
                                  // handle success
                                  console.log(response.data);
                                  alert('Los datos fueron actualizados');

                              })
                              .catch(function (error) {
                                  // handle error
                                  console.log(error);

                              })
                              .then(function () {
                                  // always executed
                              });
                      }

                    }
                  })
</script>