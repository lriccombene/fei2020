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
//echo $this->render('/components/ModelForm');
?>

<div class="area-form " >


    <form  id="app"   method="post">


    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nombre">Nombre :</label>
		</div>
		<div class="col-md-8">

            <input v-bind:placeholder="nombre_hint" id="nombre" v-model="nombre" type="text" name="nombre" required >
            <span class="text-danger" v-if="errors.nombre" >{{errors.nombre}}</span>
            
		</div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="Descripcion">Descripcion :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="descripcion_hint"  id="descripcion" v-model="descripcion" type="text" name="descripcion">
            <span class="text-danger" v-if="errors.descripcion" >{{errors.descripcion}}</span>
        </div>
	</div>

    <div class="row">
		<div class="col-md-2">
                
          <button v-if="!id" type="button" v-on:click="addArea()"  class="btn btn-success">Enviar</button>
          <button v-if="id" v-on:click ="editArea(id)" type ="button" class="btn btn-warning" >Actualizar</button>
              
        </div>
    </div>

    </form>
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
                      errors: {},
                    },  // define methods under the `methods` object
                    methods: {
                      normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                      },
                      editArea:function(id){
                        
                        var self = this;
                        const params = new URLSearchParams();
                           params.append('nombre', self.nombre);
                           params.append('descripcion', self.descripcion);
                           //alert(params);
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