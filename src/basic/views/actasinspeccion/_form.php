<?php

Yii::$app->params['boostrap']=4;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css",['position'=>$this::POS_HEAD]);
//$this->registerCssFile("//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>$this::POS_HEAD]);
//$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
/* @var $this yii\web\View */
/* @var $model app\models\Actasinspeccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actasinspeccion-form">

<div  id="app" class="container-fluid">
    <div class="form-group">
            <label for="nro">Número :</label>
            <input v-bind:placeholder="nro_hint" class="form-control"  id="nro" v-model="nro" type="text" name="nro" required >
            <span class="text-danger" v-if="errors.nro" >{{errors.nro}}</span>
	</div>
    <div class="form-group">
            <label for="fec">Fecha :</label>
            <input v-bind:placeholder="fec_hint" class="form-control" id="fec" v-model="fec" type="date" name="fec">
            <span class="text-danger" v-if="errors.fec" >{{errors.fec}}</span>
	</div>
    <div class="form-group">
            <label for="localidad">Localidad :</label>
            <select v-model="selected_localidad" class="form-control" required >
            <option v-for="option in localidades" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_localidad" >{{errors.id_localidad}}</span>
	</div>
    <div class="form-group">
        <label for="categoria">Categoría :</label>
        <select v-model="selected_categoria" class="form-control" required >
            <option v-for="option in categorias" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_categoria" >{{errors.id_categoria}}</span>
	</div>
    <div class="form-group">
        <label for="motivo">Motivo :</label>
        <select v-model="selected_motivo" class="form-control" required >
            <option v-for="option in motivos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_motivo" >{{errors.id_motivo}}</span>
    </div>
    <div class="form-group">
        <label for="empresa">Empresa :</label>
        <select v-model="selected_empresa" class="form-control" required >
            <option v-for="option in empresas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_empresa" >{{errors.id_empresa}}</span>
	</div>
    <div class="form-group">
        <label for="area">Área :</label>
        <select v-model="selected_area" class="form-control" required >
        <option v-for="option in areas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_area" >{{errors.id_area}}</span>
	</div>
    <div class="form-group">
            <label for="latitud">Latitud :</label>
            <input v-bind:placeholder="latitud_hint"  class="form-control" id="latitud" v-model="latitud" type="text" name="latitud">
            <span class="text-danger" v-if="errors.latitud" >{{errors.latitud}}</span>
	</div>
    <div class="form-group">
            <label for="longitud">Longitud :</label>
            <input v-bind:placeholder="longitud_hint" class="form-control"  id="longitud" v-model="longitud" type="text" name="longitud">
            <span class="text-danger" v-if="errors.longitud" >{{errors.longitud}}</span>
	</div>


    <div class="row">
      <div class="col-md-2">

             <button v-if="!id"  v-on:click="addActas()"  type ="button"  class="btn btn-success">Enviar</button>
              <button v-if="id" v-on:click ="editActas(id)" type ="button" class="btn btn-warning" >Actualizar</button>

          </div>
      </div>
    </div>


</div>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{

                        id:'<?php  echo ($model->id); ?>',
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrerse nro',
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrerse fec',
                        selected_localidad: '<?php  echo ($model->id_categoria); ?>',
                        localidades:[],
                        selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                        categorias: [],
                        selected_motivo: '<?php  echo ($model->id_motivo); ?>',
                        motivos: [ ],
                        selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                        empresas: [],
                        selected_area: '<?php  echo ($model->id_area); ?>',
                        areas: [],
                        longitud: '<?php  echo ($model->longitud); ?>',
                        longitud_hint: 'ingrese longitud',
                        latitud: '<?php  echo ($model->latitud); ?>',
                        latitud_hint: 'ingrese latitud',
                        errors: {},

                    },
                    mounted() {
                        this.getLocalidad();
                        this.getCategorias();
                        this.getMotivos();
                        this.getEmpresas();
                        this.getAreas();
                        },
                    methods: {
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        getAreas(){
                            var self = this;
                            axios.get('/apv1/area?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las areas");
                                    // self.especialidades = response.data;
                                    self.areas = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getEmpresas(){
                            var self = this;
                            axios.get('/apv1/empresa?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las empresa");
                                    // self.especialidades = response.data;
                                    self.empresas = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getMotivos(){
                            var self = this;
                            axios.get('/apv1/motivo?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las motivo");
                                    // self.especialidades = response.data;
                                    self.motivos = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getCategorias(){
                            var self = this;
                            axios.get('/apv1/categoria?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las categorias");
                                    // self.especialidades = response.data;
                                    self.categorias = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getLocalidad(){
                            var self = this;
                            axios.get('/apv1/localidad?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las localidades");
                                    // self.especialidades = response.data;
                                    self.localidades = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                       addActas:function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nro', self.nro);
                           params.append('fec', self.fec);
                           params.append('id_localidad', self.selected_localidad);
                           params.append('id_categoria', self.selected_categoria);
                           params.append('id_motivo', self.selected_motivo);
                           params.append('id_empresa', self.selected_empresa);
                           params.append('id_area', self.selected_area);
                           params.append('latitud', self.latitud);
                           params.append('longitud', self.longitud);
                           axios.post('/apv1/actasinspeccion',params)
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
                      editActas:function(id){

                        var self = this;
                        const params = new URLSearchParams();
                        params.append('nro', self.nro);
                           params.append('fec', self.fec);
                           params.append('id_localidad', self.selected_localidad);
                           params.append('id_categoria', self.selected_categoria);
                           params.append('id_motivo', self.selected_motivo);
                           params.append('id_empresa', self.selected_empresa);
                           params.append('id_area', self.selected_area);
                           params.append('latitud', self.latitud);
                           params.append('longitud', self.longitud);
                          // alert(params);
                           axios.patch('/apv1/actasinspeccion'+'/'+id,params)
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
