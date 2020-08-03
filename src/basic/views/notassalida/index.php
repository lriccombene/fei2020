<?php
Yii::$app->params['boostrap']=4;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotassalidaSearch */
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

$this->title = 'Notas de salida';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notassalida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Notas de salida', ['create'], ['class' => 'btn btn-success']) ?>
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
                        fec emision
                        </th>
                        <th>
                        fec notificado
                        </th>
                        <th>
                        categoria
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
                            <input v-on:change="getNotassalida()" class="form-control" v-model="filter.fec_emision">
                        </td>
                        <td>
                            <input v-on:change="getNotassalida()" class="form-control" v-model="filter.fec_notificado">
                        </td>
                        <td>
                            <input v-on:change="getNotassalida()" class="form-control" v-model="filter.categoria">
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(nota,key) of notassalidas" v-bind:key="nota.id">
                    <td scope="row">{{nota.id}} </td>
                        <td>
                            {{nota.fec_emision}}
                        </td>
                        <td>
                            {{nota.fec_notificado}}
                        </td>
                        <td>
                            {{nota.categoria.nombre}}
                        </td>
                        <td>
                           <button v-on:click ="edit(nota.id)" type ="button" class="btn btn-warning">Editor</button>
                        </td>
                        <td>
                           <button v-on:click ="delete(nota.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                    notassalidas:[],
                    notassalida: {},
                    id:'',
                    currentPage: 1,
                    pagination:{},
                    filter:{},
                },
                mounted(){
                    this.getNotassalida();
                    
                },
                watch:{
                    currentPage:function(){
                        this.getNotassalida();
                    }
                },
                // define methods under the `methods` object
                methods: {
                    getNotassalida:function(){
                        
                        var self=this;
                        const params = new URLSearchParams();
                       params.append('fec_ingreso', self.filter.fec_ingreso);
                       params.append('fec_notificado', self.filter.fec_notificado);
                       params.append('categoria', self.filter.categoria);
                       axios.get('/apv1/notassalida?page='+self.currentPage,{params:self.filter})
                            .then(function (response) {
                                // handle success
                                console.log(response.data);
                                self.pagination.total = response.headers['x-pagination-total-count'];
                                self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                self.pagination.perPage = response.headers['x-pagination-per-page'];
                                self.notassalidas=response.data;
                            })
                            .catch(function (error) {
                                // handle error
                                console.log(error);

                            })
                            .then(function () {
                                // always executed
                            });
                    },
                    delete:function(id){
                        var self=this;
                        axios.delete('/apv1/notassalida/'+id)
                            .then(function (response) {
                                // handle success
                                console.log(response.data);
                                self.getNotassalida();
                            })
                            .catch(function (error) {
                                // handle error
                                console.log(error);
                            })
                            .then(function () {
                                // always executed
                            });
                    },
                    edit:function(key){
                        window.location.href = '/notassalida/update?id='+key;

                    }

                  
                  }
                
              })
</script>

