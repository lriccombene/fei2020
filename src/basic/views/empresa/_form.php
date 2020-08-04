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

            <label for="descripcion">Descripcion :</label>

            <input v-bind:placeholder="descripcion_hint" class="form-control" id="descripcion" v-model="descripcion" type="text" name="descripcion" >
            <span class="text-danger" v-if="errors.descripcion" >{{errors.descripcion}}</span>

	</div>
    <div class="form-group">

            <label for="razon_social">Razon Social :</label>

            <input v-bind:placeholder="razon_social_hint" class="form-control" id="razon_social" v-model="razon_social" type="text" name="razon_social" >
            <span class="text-danger" v-if="errors.razon_social" >{{errors.razon_social}}</span>

	</div>

    <div class="form-group">

            <label for="contacto">Contacto :</label>

            <input v-bind:placeholder="contacto_hint" class="form-control" id="contacto" v-model="contacto" type="text" name="contacto" >
           <span class="text-danger" v-if="errors.contacto" >{{errors.contacto}}</span>

	</div>
    <div class="form-group">

            <label for="referente">Referente :</label>
 
            <input v-bind:placeholder="referente_hint" class="form-control" id="referente" v-model="referente" type="text" name="referente" >
            <span class="text-danger" v-if="errors.referente" >{{errors.referente}}</span>

	</div>
    <div class="form-group">

            <label for="consultor">Consultor :</label>

            <select v-model="selected_consultor" class="form-control" required >
                <option v-for="option in consultores" v-bind:value="option.id">
                    {{ option.nombre }}
                </option>
            </select>
            <span class="text-danger" v-if="errors.id_consultor" >{{errors.id_consultor}}</span>

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
                        id:'<?php  echo ($model->id); ?>',
                        nombre: '<?php  echo ($model->nombre); ?>',
                        nombre_hint: 'ingrese nombre',
                        descripcion:'<?php  echo ($model->descripcion); ?>',
                        descripcion_hint: 'ingrese descripcion',
                        razon_social:'<?php  echo ($model->razon_social); ?>',
                        razon_social_hint: 'ingrese razon social',
                        contacto:'<?php  echo ($model->contacto); ?>',
                        contacto_hint: 'ingrese Contacto',
                        referente:'<?php  echo ($model->contacto); ?>',
                        referente_hint: 'ingrese Referente',
                        consultores:[],
                        selected_consultor: '<?php  echo ($model->id_consultor); ?>',

                        errors: {}
                  
                    },
                    mounted() {
                        this.getConsultores();
                        },                 
                    methods: { 
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        getConsultores(){
                            var self = this;
                            axios.get('/apv1/consultor?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las consultores");
                                    // self.especialidades = response.data;
                                    self.consultores = response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        add:function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           params.append('razon_social', self.razon_social);
                           params.append('contacto', self.contacto);
                           params.append('referente', self.referente);
                           params.append('id_consultor', self.selected_consultor);
                           axios.post('/apv1/empresa',params)
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
                      edit:function(id){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           params.append('razon_social', self.razon_social);
                           params.append('contacto', self.contacto);
                           params.append('referente', self.referente);
                           params.append('id_consultor', self.selected_consultor);
                          // alert(params);
                           axios.patch('/apv1/empresa'+'/'+id,params)
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