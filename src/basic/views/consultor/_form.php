<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
Yii::$app->params['boostrap']=4;

$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css",['position'=>$this::POS_HEAD]);
//$this->registerCssFile("//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>$this::POS_HEAD]);
//$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>

<div class="empresa-form " >

  <div id="app" class="container-fluid">
        <div class="form-group">

                  <label for="nombre">Nombre :</label>
                  <input v-bind:placeholder="nombre_hint" class="form-control" id="nombre" v-model="nombre" type="text" name="nombre" required >
                   <span class="text-danger" v-if="errors.nombre" >{{errors.nombre}}</span>

      	</div>
          <div class="form-group">

                  <label for="apellido">Apellido :</label>
                  <input v-bind:placeholder="apellido_hint" class="form-control" id="apellido" v-model="apellido" type="text" name="apellido" >
                  <span class="text-danger" v-if="errors.apellido" >{{errors.apellido}}</span>

      	</div>
        <div class="form-group">

                <label for="email">Email :</label>
                <input v-bind:placeholder="email_hint" class="form-control" id="email" v-model="email" type="text" name="email" >
                <span class="text-danger" v-if="errors.email" >{{errors.email}}</span>
    	</div>
        <div class="form-group">

                <label for="telefono">Telefono :</label>
                <input v-bind:placeholder="telefono_hint" class="form-control" id="telefono" v-model="telefono" type="text" name="telefono" >
               <span class="text-danger" v-if="errors.telefono" >{{errors.telefono}}</span>

    	</div>
        <div class="form-group">

                <label for="domicilio">Domicilio :</label>
                <input v-bind:placeholder="domicilio_hint" class="form-control" id="domicilio" v-model="domicilio" type="text" name="domicilio" >
                <span class="text-danger" v-if="errors.domicilio" >{{errors.domicilio}}</span>

    	</div>
      <div class="form-group">
              <label for="nro">Número:</label>
              <input v-bind:placeholder="nro_hint" class="form-control" id="nro" v-model="nro" type="text" name="nro" required >
              <span class="text-danger" v-if="errors.nro" >{{errors.nro}}</span>

     </div>
    <div class="row">
  		<div class="col-md-2">
              <button v-if="!id"  v-on:click="add()"  type ="button"  class="btn btn-success">Enviar</button>
              <button v-if="id" v-on:click ="edit(id)" type ="button" class="btn btn-warning" >Actualizar</button>
      </div>
    </div>
</div>
<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                        id:'',
                        nombre: '',
                        nombre_hint: 'ingrese nombre',
                        apellido:'',
                        apellido_hint: 'ingrese apellido',
                        email:'',
                        email: 'ingrese email',
                        telefono:'',
                        telefono_hint: 'ingrese telefono',
                        domicilio:'',
                        domicilio_hint: 'ingrese domicilio',
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrese numero',

                        errors: {},
                    },
                    methods: {
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        add:function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('apellido', self.apellido);
                           params.append('email', self.email);
                           params.append('telefono', self.telefono);
                           params.append('domicilio', self.domicilio);
                           params.append('nro', self.nro);
                           axios.post('/apv1/consultor',params)
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
                              });
                      }
                    }
                  })
</script>
