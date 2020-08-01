<?php
Yii::$app->params['boostrap']=4;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnviosdocumentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" ,['position'=>View::POS_HEAD]);


$this->registerJsFile("https://polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>View::POS_HEAD]);


$this->registerJsFile("https://unpkg.com/vue@latest/dist/vue.min.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>View::POS_HEAD]);


$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>View::POS_HEAD]);


$this->title = 'Envios documentacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enviosdocumentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Envios documentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <div id='app'>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
          <b-pagination
            v-model="currentPage"
            :total-rows.number="pagination.total"
            :per-page.number="pagination.perPage"
            aria-controls="my-table"
            ></b-pagination> 

                <p class="mt-3">Current Page: {{ currentPage }}</p>
                <table class="table">
                    <thead>
                        <tr>
                        <th>
                            id
                            </th>
                            <th>
                            Nro
                            </th>
                            <th>
                            fec
                            </th>
                            <th>
                            detalle
                            </th>
                            <th>
                            relevancia
                            </th>
                            <th>
                            Archivo url notificado
                            </th>
                            <th>
                            Destino
                            </th>
                            <th>
                            Fec Notificado
                            </th>
                            <th>
                                
                            </th>
                            <th>
                         
                            </th>
                            <th>

                            </th>
                        </tr>
                        <tr>
                        <td></td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.nro">
                            </td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.fec">
                            </td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.detalle">
                            </td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.relevancia">
                            </td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.archivo_urlnotificado">
                            </td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.destino">
                            </td>
                            <td>
                                <input v-on:change="getEnviosDocumentacion()" class="form-control" v-model="filter.fec_notificado">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(doc,key) of enviosdocumentaciones" v-bind:key="doc.id">
                        <td scope="row">{{doc.id}} </td>
                            <td>
                                {{doc.nro}}
                            </td>
                            <td>
                                {{doc.fec}}
                            </td>
                            <td>
                                {{doc.detalle}}
                            </td>
                            <td>
                                {{doc.relevancia.nombre}}
                            </td>
                            <td>
                                {{doc.archivo_urlnotificado}}
                            </td>
                            <td>
                                {{doc.destino}}
                            </td>
                            <td>
                                {{doc.fec_notificado}}
                            </td>
                            <td>
                               <button v-on:click ="editDoc(doc.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteDoc(doc.id)" type ="button" class="btn btn-danger">Borrar</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>



</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                        enviosdocumentaciones:[],
                        enviosdocumentacion: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getEnviosDocumentacion();
                        
                    },
                    watch:{
                        currentPage:function(){
                            this.getEnviosDocumentacion();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getEnviosDocumentacion:function(){
                            
                            var self=this;
                            const params = new URLSearchParams();
                            params.append('nro', self.filter.nro);
                            params.append('fec', self.filter.fec);
                           params.append('detalle', self.filter.detalle);
                           params.append('relevancia', self.filter.relevancia);
                           params.append('destino', self.filter.destino);
                           axios.get('/apv1/enviosdocumentacion?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    
                                    self.enviosdocumentaciones=response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteDoc:function(id){
                            var self=this;
                            axios.delete('/apv1/enviosdocumentacion/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getEnviosDocumentacion();

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editDoc:function(key){
                            window.location.href = '/enviosdocumentacion/update?id='+key;

                        }

                      
}

})
</script>