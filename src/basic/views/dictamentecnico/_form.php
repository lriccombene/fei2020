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
/* @var $model app\models\Dictamentecnico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictamentecnico-form">
    <div id="app" class="container-fluid">

    		<div class="form-group">
                <label for="nro">Número:</label>
                <input v-bind:placeholder="nro_hint" class="form-control" id="nro" v-model="nro" type="text" name="nro" required >
                <span class="text-danger" v-if="errors.nro" >{{errors.nro}}</span>

    	 </div>

  		 <div class="form-group">
              <label for="fec">Fecha :</label>

              <input v-bind:placeholder="fec_hint" class="form-control"  id="fec" v-model="fec" type="date" name="fec">
              <span class="text-danger" v-if="errors.fec" >{{errors.fec}}</span>

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
            <label for="empresa">Empresa :</label>
           <select v-model="selected_empresa" class="form-control" required >
            <option v-for="option in empresas" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_empresa" >{{errors.id_empresa}}</span>
        si no encuentra la empresa a click en la siguiente pagina
        <b-pagination
                  v-model="currentPageEmpresa"
                  :total-rows="paginationempresa.total"
                  :per-page="paginationempresa.perPage"
                  aria-controls="my-table"
              ></b-pagination>
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
            <label for="yacimiento">Yacimiento :</label>

           <select v-model="selected_yacimiento" class="form-control" required >
            <option v-for="option in yacimientos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_yacimiento" >{{errors.id_yacimiento}}</span>
        si no encuentra el yacimiento a click en la siguiente pagina
        <b-pagination
                  v-model="currentPageYacimiento"
                  :total-rows="paginationyacimiento.total"
                  :per-page="paginationyacimiento.perPage"
                  aria-controls="my-table"
              ></b-pagination>
    </div>

		<div class="form-group">
            <label for="tipodictamen">Tipo dictamen:</label>

        <select v-model="selected_tipodictamen" class="form-control" required >
            <option v-for="option in tipodictamenes" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_tipodictamen" >{{errors.id_tipodictamen}}</span>
    </div>

		<div class="form-group">
            <label for="tipotrabajo">Tipo trabajo:</label>

        <select v-model="selected_tipotrabajo" class="form-control" required >
            <option v-for="option in tipotrabajos" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
        <span class="text-danger" v-if="errors.id_tipotrabajo" >{{errors.id_tipotrabajo}}</span>
    </div>
		<div class="form-group">
            <label for="detalle">Detalle :</label>

            <b-form-textarea v-bind:placeholder="detalle_hint" class="form-control" id="detalle" v-model="detalle" type="textarea" name="detalle">
            <span class="text-danger" v-if="errors.detalle" >{{errors.detalle}}</span>
    </div>

		<div class="form-group">
            <label for="latitud">Latitud :</label>

            <input v-bind:placeholder="latitud_hint" class="form-control" id="latitud" v-model="latitud" type="text" name="latitud">
            <span class="text-danger" v-if="errors.latitud" >{{errors.latitud}}</span>
    </div>

		<div class="form-group">
            <label for="longitud">Longitud :</label>

            <input v-bind:placeholder="longitud_hint" class="form-control" id="longitud" v-model="longitud" type="text" name="longitud">
            <span class="text-danger" v-if="errors.longitud" >{{errors.longitud}}</span>
    </div>


<p></p>

    <div class="row">
      <div class="col-md-4">

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
                        id:'<?php  echo ($model->id); ?>',
                        currentPageEmpresa: 1,
                        paginationempresa:{},
                        currentPageYacimiento: 1,
                        paginationyacimiento:{},

                    },
                    mounted() {
                        this.getCategorias();
                        this.getEmpresas();
                        this.getAreas();
                        this.getYacimiento();
                        this.getTipotrabajo();
                        this.getTipodictamen();
                        },
                        watch:{
                                currentPageEmpresa: function() {
                                    this.getEmpresas();
                                },
                                 currentPageYacimiento: function() {
                                      this.getYacimiento();
                                  }
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
                            axios.get('/apv1/yacimiento?sort=-nombre&page='+self.currentPageYacimiento)
                                .then(function (response) {
                                  self.paginationyacimiento.total = response.headers['x-pagination-total-count'];
                                  self.paginationyacimiento.totalPages = response.headers['x-pagination-page-count'];
                                  self.paginationyacimiento.perPage = response.headers['x-pagination-per-page'];
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
                            axios.get('/apv1/empresa?sort=-nombre&page='+self.currentPageEmpresa)
                                .then(function (response) {
                                  self.paginationempresa.total = response.headers['x-pagination-total-count'];
                                  self.paginationempresa.totalPages = response.headers['x-pagination-page-count'];
                                  self.paginationempresa.perPage = response.headers['x-pagination-per-page'];
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
