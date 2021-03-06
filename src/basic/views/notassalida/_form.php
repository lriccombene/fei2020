<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notassalida */
/* @var $form yii\widgets\ActiveForm */
use yii\web\View;
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
?>
   <p> </p>
   <p> </p>
   <p> </p>
<div class="notassalida-form">
  <?php
 echo ($model->id);

  ?>
    <div id="app" class="container-fluid">

                <div class="form-group">
                    <label for="fec_emision">Fecha emisión:</label>

                    <input v-bind:placeholder="fec_emision" class="form-control" id="fec_emision" v-model="fec_emision" type="date" name="fec_emision" required >
                    <span class="text-danger" v-if="errors.fec_emision" >{{errors.fec_emision}}</span>
                </div>
                <div class="form-group">
                    <label for="fec_notificado">Fecha notificación :</label>
                    <input v-bind:placeholder="fec_notificado_hint" class="form-control" id="fec_notificado" v-model="fec_notificado" type="date" name="fec_notificado">
                    <span class="text-danger" v-if="errors.fec_notificado" >{{errors.fec_notificado}}</span>
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
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle :</label>
                    <textarea v-bind:placeholder="detalle_hint" class="form-control" id="detalle" v-model="detalle" type="text" name="detalle"></textarea>
                    <span class="text-danger" v-if="errors.detalle" >{{errors.detalle}}</span>
                </div>

                <div class="form-group">
                    <label for="notificado">Notificado :</label>
                    <input v-bind:placeholder="notificado_hint" class="form-control" id="notificado" v-model="notificado" type="text" name="notificado">
                    <span class="text-danger" v-if="errors.notificado" >{{errors.notificado}}</span>
                </div>

            <p> </p>
            <p> </p>
            <p> </p>

                <div class="form-group">
                    <button v-if="!id"  v-on:click="add()"  type ="button"  class="btn btn-success">Enviar</button>
                    <button v-if="id" v-on:click ="edit(id)" type ="button" class="btn btn-warning" >Actualizar</button>
                </div>

    </div>


</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                      id:'<?php  echo ($model->id); ?>',
                      fec_emision: '<?php  echo ($model->fec_emision); ?>',
                      fec_emision_hint: 'ingrere fecha emision',
                      fec_notificado:'<?php  echo ($model->fec_notificado); ?>',
                      fec_notificado_hint: 'ingrese fec notificado',
                      selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                      categorias: [],
                      selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                      empresas: [],
                      detalle: '<?php  echo ($model->detalle); ?>',
                      detalle_hint: 'ingrese detalle',
                      notificado: '<?php  echo ($model->notificado); ?>',
                      notificado_hint: 'ingrese notificado',
                      errors: {},
                    },
                    mounted() {
                        this.getCategorias();
                        this.getEmpresas();
                        },
                    methods: {
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
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
                            params.append('fec_emision', self.fec_emision);
                            params.append('fec_notificado', self.fec_notificado);
                            params.append('id_categoria', self.selected_categoria);
                            params.append('id_empresa', self.selected_empresa);
                            params.append('detalle', self.detalle);
                            params.append('notificado', self.notificado);
                            axios.post('/apv1/notassalida',params)
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
                            params.append('id_localidad', self.selected_localidad);
                            params.append('id_categoria', self.selected_categoria);
                            params.append('id_motivo', self.selected_motivo);
                            params.append('id_empresa', self.selected_empresa);
                            params.append('id_area', self.selected_area);
                            params.append('latitud', self.latitud);
                            params.append('longitud', self.longitud);
                            // alert(params);
                            axios.patch('/apv1/notassalida'+'/'+id,params)
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
