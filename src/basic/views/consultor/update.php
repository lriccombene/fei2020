<?php

use yii\helpers\Html;
Yii::$app->params['boostrap']=4;
/* @var $this yii\web\View */
/* @var $model app\models\Consultor */
$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css",['position'=>$this::POS_HEAD]);
//$this->registerCssFile("//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>$this::POS_HEAD]);
//$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

$this->title = 'Actualizar Consultor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Consultores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="consultor-update">

    <h1><?= Html::encode($this->title) ?></h1>

<form  >
 <div id="app" >

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nombre">Nombre :</label>
		</div>
		<div class="col-md-8">
            <input v-bind:placeholder="nombre_hint" id="nombre" v-model="nombre" type="text" name="nombre" required >
            <span class="text-danger" v-if="errors.nombre" >{{errors.nombre}}</span>
		</div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="apellido">Apellido :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="apellido_hint"  id="apellido" v-model="apellido" type="text" name="apellido" required>
            <span class="text-danger" v-if="errors.apellido" >{{errors.apellido}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="telefono">Telefono :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="telefono_hint"  id="telefono" v-model="telefono" type="text" name="telefono" required>
            <span class="text-danger" v-if="errors.telefono" >{{errors.telefono}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="email">Email :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="email_hint"  id="email" v-model="email" type="email" name="email" required>
            <span class="text-danger" v-if="errors.email" >{{errors.email}}</span>
        </div>
	</div>

    <div class="row">
		<div class="col-md-2">
            <label for="domicilio">Domicilio :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="domicilio_hint"  id="domicilio" v-model="domicilio" type="text" name="domicilio" required>
            <span class="text-danger" v-if="errors.domicilio" >{{errors.domicilio}}</span>
        </div>
	</div>


    <div class="row">
		<div class="col-md-2">
          <button v-if="id" v-on:click ="editCons(id)" type ="button" class="btn btn-warning" >Actualizar</button>
              
        </div>
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
                        domicilio_hint: 'ingrerse domicilio',
                        id:'<?php  echo ($model->id); ?>',
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
                     editCons:function(id){
                        
                        var self = this;
                        const params = new URLSearchParams();
                        params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           params.append('telefono', self.telefono);
                           params.append('domicilio', self.domicilio);
                           params.append('email', self.email);
                           axios.patch('/apv1/consultor'+'/'+id,params)
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