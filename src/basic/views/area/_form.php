<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>


<div id="app" >
	<div class="row">
		<div class="col-md-2">
            <label for="nombre">Nombre :</label>
		</div>
		<div class="col-md-8">
          <input v-bind:placeholder="nombre_hint" id="nombre" v-model="nombre" type="text" name="nombre" required >
		</div>
	</div>
    <div class="row">
      <div class="col-md-2">
              <label for="Descripcion">Descripcion :</label>
      </div>
      <div class="col-md-8">
              <input v-bind:placeholder="descripcion_hint"  id="descripcion" v-model="descripcion" type="text" name="descripcion">
      </div>
	  </div>

    <div class="row">
      <div class="col-md-2"> 
              
              <input v-if="!id" type="submit" v-on:click="addArea()" value="Enviar" class="btn btn-success">
              <button v-if="id" v-on:click ="editArea(id)" type ="button" class="btn btn-warning" >Actualizar</button>
              
          </div>
      </div>
    </div>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                      nombre: '<?php  echo ($model->nombre); ?>',
                      nombre_hint: 'ingrerse nombre',
                      descripcion:'<?php  echo ($model->descripcion); ?>',
                      descripcion_hint: 'ingrerse descripcion',
                      id:'<?php  echo ($model->id); ?>',
                    },  // define methods under the `methods` object
                    methods: {
                      addArea: function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           axios.post('/apv1/area',params)
                              .then(function (response) {
                                  // handle success
                                  console.log(response.data);
                                  alert('Los datos fueron guardados');

                              })
                              .catch(function (error) {
                                  // handle error
                                  console.log(error);

                              })
                              .then(function () {
                                  // always executed
                              });
                      },
                      editArea:function(id){
                        
                        var self = this;
                        const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           alert(params);
                           axios.patch('/apv1/area'+'/'+id,params)
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