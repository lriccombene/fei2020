<?php
Yii::$app->params['boostrap']=4;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>
<div class="mesaentrada-form">
<div  id="app" class="container-fluid">
<div class="form-group">
                <label for="fec">Fecha :</label>
                <input v-bind:placeholder="fec" class="form-control" id="fec" v-model="fec" type="date" name="fec" required >
                <span class="text-danger" v-if="errors.fec" >{{errors.fec}}</span>
        </div>
        <div class="form-group">
                <label for="fec_ingreso">Fecha ingreso :</label>
                <input v-bind:placeholder="fec_ingreso_hint"   class="form-control" id="fec_ingreso" v-model="fec_ingreso" type="date" name="fec_ingreso">
                <span class="text-danger" v-if="errors.fec_ingreso" >{{errors.fec_ingreso}}</span>
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
                <label for="tramite">Trámite :</label>
            <select v-model="selected_tramite" class="form-control" required >
                <option v-for="option in tramites" v-bind:value="option.id">
                    {{ option.nombre }}
                </option>
            </select>
            <span class="text-danger" v-if="errors.id_tramite" >{{errors.id_tramite}}</span>
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
                    <label for="descripcion">Descripción :</label>
                    <textarea v-bind:placeholder="descripcion_hint" class="form-control"  id="descripcion" v-model="descripcion" type="text" name="descripcion"></textarea>
                    <span class="text-danger" v-if="errors.descripcion" >{{errors.descripcion}}</span>
            </div>
            <div class="form-group">
                <div class="col-md-2"> 
              
                    <input v-if="!id" type="submit" v-on:click="add()" value="Enviar" class="btn btn-success">
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
                      errors: {},
                      fec: '<?php  echo ($model->fec); ?>',
                      fec_hint: 'ingrerse fecha',
                      fec_ingreso:'<?php  echo ($model->fec_ingreso); ?>',
                      fec_ingreso_hint: 'ingrerse descripcion',
                      selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                      categorias: [],
                      selected_tramite: '<?php  echo ($model->id_tramite); ?>',
                      tramites: [],
                      selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                      empresas: [],
                      descripcion: '<?php  echo ($model->descripcion); ?>',
                      descripcion_hint: 'ingrerse descripcion'
                    },                    
                    mounted() {
                        this.getTramites();
                        this.getCategorias();
                        this.getEmpresas();
                    },   // define methods under the `methods` object
                    methods: {
                      normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                      },
                        getTramites(){
                            var self = this;
                            axios.get('/apv1/tipotramite?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las Tipo tramites");
                                    // self.especialidades = response.data;
                                    self.tramites = response.data;
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
                      add: function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('fec', self.fec);
                           params.append('fec_ingreso', self.fec_ingreso);
                           params.append('id_categoria', self.selected_categoria);
                           params.append('id_tramite', self.selected_tramite);
                           params.append('id_empresa', self.selected_empresa);
                           params.append('descripcion', self.descripcion);
                           axios.post('/apv1/mesaentrada',params)
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
                        params.append('fec', self.fec);
                        params.append('fec_ingreso', self.fec_ingreso);
                        params.append('id_categoria', self.selected_categoria);
                        params.append('id_tramite', self.selected_tramite);
                        params.append('id_empresa', self.selected_empresa);
                        params.append('descripcion', self.descripcion);
                        axios.patch('/apv1/mesaentrada'+'/'+id,params)
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