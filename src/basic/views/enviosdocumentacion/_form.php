<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
/* @var $this yii\web\View */
/* @var $model app\models\Enviosdocumentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enviosdocumentacion-form">


<div id="app"class="container-fluid">

<div class="form-group">
            <label for="fec">Fecha :</label>
            <input v-bind:placeholder="fec_hint"  class="form-control"  id="fec" v-model="fec" type="date" name="fec">
            <span class="text-danger" v-if="errors.fec" >{{errors.fec}}</span>
	</div>
    <div class="form-group">
            <label for="transporte">Número :</label>
            <input v-bind:placeholder="transporte_hint"  class="form-control"  id="transporte" v-model="transporte" type="text" name="transporte" required >
	</div>
    <div class="form-group">
            <label for="relevancia">Relevancia :</label>
        <select v-model="selected_relevancia" class="form-control"  required >
            <option v-for="option in relevancias" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
    </div>
     <div class="form-group">
            <label for="detalle">Detalle :</label>
            <input v-bind:placeholder="detalle_hint"  class="form-control"  id="detalle" v-model="detalle" type="text" name="detalle">
	</div>
    <div class="form-group">
            <label for="archivo_urlnotificado">Archivo url notificado :</label>
            <input v-bind:placeholder="archivo_urlnotificado_hint"  class="form-control"  id="archivo_urlnotificado" v-model="archivo_urlnotificado" type="text" name="archivo_urlnotificado">
	</div>
    <div class="form-group">
            <label for="destino">Destino :</label>
            <input v-bind:placeholder="destino_hint" class="form-control"  id="destino" v-model="destino" type="text" name="destino">
	</div>
    <div class="form-group">
            <label for="fec_notificado">Fecha Notificado:</label>
            <input v-bind:placeholder="fec_notificado_hint" class="form-control"  id="fec_notificado" v-model="fec_notificado" type="date" name="fec_notificado">
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
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrerse fec',
                        transporte: '<?php  echo ($model->transporte); ?>',
                        transporte_hint: 'ingrerse transporte',
                        selected_relevancia: '<?php  echo ($model->id_relevancia); ?>',
                        relevancias: [],
                        detalle: '<?php  echo ($model->detalle); ?>',
                        detalle_hint: 'ingrerse detalle',
                        archivo_urlnotificado: '<?php  echo ($model->archivo_urlnotificado); ?>',
                        archivo_urlnotificado_hint: 'ingrese archivo url notificado',
                        destino: '<?php  echo ($model->destino); ?>',
                        destino_hint: 'ingrese destino',
                        fec_notificado: '<?php  echo ($model->fec_notificado); ?>',
                        fec_notificado_hint: 'ingrese fecha notificado',
                        errors: {},
                        id:'<?php  echo ($model->id); ?>'
                    },
                    mounted() {
                        this.getRelevancias();
                    },                 
                    methods: { 
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        getRelevancias(){
                            var self = this;
                            axios.get('/apv1/relevancia?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las relevancias");
                                    // self.especialidades = response.data;
                                    self.relevancias = response.data;
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
                           params.append('fec', self.fec);
                           params.append('transporte', self.transporte);
                           params.append('id_relevancia', self.selected_relevancia);
                           params.append('detalle', self.detalle);
                           params.append('archivo_urlnotificado', self.archivo_urlnotificado);
                           params.append('destino', self.destino);
                           params.append('fec_notificado', self.fec_notificado);
                           axios.post('/apv1/enviosdocumentacion',params)
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
                           params.append('transporte', self.transporte);
                           params.append('id_relevancia', self.selected_relevancia);
                           params.append('detalle', self.detalle);
                           params.append('archivo_urlnotificado', self.archivo_urlnotificado);
                           params.append('destino', self.destino);
                           params.append('fec_notificado', self.fec_notificado);
                          // alert(params);
                           axios.patch('/apv1/enviosdocumentacion'+'/'+id,params)
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