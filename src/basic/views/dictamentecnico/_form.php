<?php
Yii::$app->params['boostrap']=4;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

/* @var $this yii\web\View */
/* @var $model app\models\Dictamentecnico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictamentecnico-form">



    <div id="app" class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nro">Nro :</label>
		</div>
		<div class="col-md-8">

            <input v-bind:placeholder="nro_hint" id="nro" v-model="nro" type="text" name="nro" required >
            <span class="text-danger" v-if="errors.nro" >{{errors.nro}}</span>
		</div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="fec">Fec :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="fec_hint"  id="fec" v-model="fec" type="date" name="fec">
            <span class="text-danger" v-if="errors.fec" >{{errors.fec}}</span>
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
        <span class="text-danger" v-if="errors.id_categoria" >{{errors.id_categoria}}</span>
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
        <span class="text-danger" v-if="errors.id_empresa" >{{errors.id_empresa}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="area">Area :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_area" required >
            <option v-for="option in areas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_area" >{{errors.id_area}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="yacimiento">Yacimiento :</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_yacimiento" required >
            <option v-for="option in yacimientos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_yacimiento" >{{errors.id_yacimiento}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="tipodictamen">Tipo dictamen:</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_tipodictamen" required >
            <option v-for="option in tipodictamenes" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_tipodictamen" >{{errors.id_tipodictamen}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="tipotrabajo">Tipo trabajo:</label>
        </div>
       <div class="col-md-8">
        <select v-model="selected_tipotrabajo" required >
            <option v-for="option in tipotrabajos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_tipotrabajo" >{{errors.id_tipotrabajo}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="detalle">Detalle :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="detalle_hint"  id="detalle" v-model="detalle" type="text" name="detalle">
            <span class="text-danger" v-if="errors.detalle" >{{errors.detalle}}</span>
        </div>
	</div>

    <div class="row">
		<div class="col-md-2">
            <label for="latitud">Latitud :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="latitud_hint"  id="latitud" v-model="latitud" type="text" name="latitud">
            <span class="text-danger" v-if="errors.latitud" >{{errors.latitud}}</span>
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="longitud">Longitud :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="longitud_hint"  id="longitud" v-model="longitud" type="text" name="longitud">
            <span class="text-danger" v-if="errors.longitud" >{{errors.longitud}}</span>
        </div>
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
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrese nro',
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrese fec',
                        selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                        categorias: [],
                        selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                        empresas: [],
                        selected_area: '<?php  echo ($model->id_area); ?>',
                        areas: [],
                        selected_yacimiento: '<?php  echo ($model->id_yacimiento); ?>',
                        yacimientos: [],
                        selected_tipodictamen: '<?php  echo ($model->id_tipodictamen); ?>',
                        tipodictamenes: [],
                        selected_tipotrabajo: '<?php  echo ($model->id_tipotrabajo); ?>',
                        tipotrabajos: [],
                        detalle: '<?php  echo ($model->detalle); ?>',
                        detalle_hint: 'ingrese detalle',
                        longitud: '<?php  echo ($model->longitud); ?>',
                        longitud_hint: 'ingrese longitud',
                        latitud: '<?php  echo ($model->latitud); ?>',
                        latitud_hint: 'ingrese latitud',
                        errors: {},
                        id:'<?php  echo ($model->id); ?>'
                    },
                    mounted() {
                        this.getCategorias();
                        this.getEmpresas();
                        this.getAreas();
                        this.getYacimiento();
                        this.getTipotrabajo();
                        this.getTipodictamen();
                        },
                    methods: {
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        getTipodictamen(){
                            var self = this;
                            axios.get('/apv1/tipodictamen?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las tipo dictamen");
                                    // self.especialidades = response.data;
                                    self.tipodictamenes = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getTipotrabajo(){
                            var self = this;
                            axios.get('/apv1/tipotrabajo?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las tipo trabajo");
                                    // self.especialidades = response.data;
                                    self.tipotrabajos = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getYacimiento(){
                            var self = this;
                            axios.get('/apv1/yacimiento?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las yacimiento");
                                    // self.especialidades = response.data;
                                    self.yacimientos = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
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
                        add:function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nro', self.nro);
                           params.append('fec', self.fec);
                           params.append('id_categoria', self.selected_categoria);
                           params.append('id_empresa', self.selected_empresa);
                           params.append('id_yacimiento', self.selected_yacimiento);
                           params.append('id_tipodictamen', self.selected_tipodictamen);
                           params.append('id_tipotrabajo', self.selected_tipotrabajo);
                           params.append('id_area', self.selected_area);
                           params.append('latitud', self.latitud);
                           params.append('longitud', self.longitud);
                           params.append('detalle', self.detalle);
                           axios.post('/apv1/dictamentecnico',params)
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
                        params.append('nro', self.nro);
                           params.append('fec', self.fec);
                           params.append('id_categoria', self.selected_categoria);
                           params.append('id_empresa', self.selected_empresa);
                           params.append('id_yacimiento', self.selected_yacimiento);
                           params.append('id_tipodictamen', self.selected_tipodictamen);
                           params.append('id_tipotrabajo', self.selected_tipotrabajo);
                           params.append('id_area', self.selected_area);
                           params.append('latitud', self.latitud);
                           params.append('longitud', self.longitud);
                          // alert(params);
                           axios.patch('/apv1/dictamentecnico'+'/'+id,params)
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
