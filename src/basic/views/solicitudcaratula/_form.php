<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>
<div class="solicitudcaratula-form">
 
<div id="app" class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <label for="fec">Fecha :</label>
        </div>
        <div class="col-md-8">

            <input  id="fec" v-model="fec" type="date" name="fec" required >
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label for="extracto">Extracto :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="extracto_hint"  id="extracto" v-model="extracto" type="text" name="extracto" maxlength="350">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label for="recibido">Recibido :</label>
        </div>
        <div class="col-md-8">
            <select v-model="selected" required >
                <option v-for="option in options" v-bind:value="option.id">
                    {{ option.nombre }}
                </option>
            </select>
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
                  id:'<?php  echo ($model->id); ?>',
                  fec: '<?php  echo ($model->fec); ?>',
                  extracto:'<?php  echo ($model->extracto); ?>',
                  extracto_hint: 'ingrerse extracto',
                  selected: '3',
                  options: [
                                { id: '1', nombre: 'Enviado' },
                                { id: '2', nombre: 'Recibido' },
                                { id: '3', nombre: '------' }
                               ],
             
                 errors: {}
                  
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
                       params.append('fec', self.fec);
                       params.append('extracto', self.extracto);
                       params.append('recibido', self.selected);
                       axios.post('/apv1/solicitudcaratula',params)
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
                       params.append('extracto', self.extracto);
                       params.append('recibido', self.selected);
                      // alert(params);
                       axios.patch('/apv1/solicitudcaratula'+'/'+id,params)
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