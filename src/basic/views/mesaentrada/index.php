<?php
Yii::$app->params['boostrap']=4;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MesaentradaSearch */
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



$this->title = 'Mesa de entrada';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesaentrada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Mesa de Entrada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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
                        fec
                        </th>
                        <th>
                        fec_ingreso
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
                            <input v-on:change="getMesaentrada()" class="form-control" v-model="filter.nro">
                        </td>
                        <td>
                            <input v-on:change="getMesaentrada()" class="form-control" v-model="filter.fec">
                        </td>
                        <td>
                            <input v-on:change="getMesaentrada()" class="form-control" v-model="filter.categoria">
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(entrada,key) of entradas" v-bind:key="entrada.id">
                    <td scope="row">{{entrada.id}} </td>
                        <td>
                            {{entrada.fec}}
                        </td>
                        <td>
                            {{entrada.fec_ingreso}}
                        </td>
                        <td>
                            {{entrada.categoria.nombre}}
                        </td>
                        <td>
                           <button v-on:click ="edit(entrada.id)" type ="button" class="btn btn-warning">Editor</button>
                        </td>
                        <td>
                           <button v-on:click ="delete(entrada.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                    entradas:[],
                    entrada: {},
                    id:'',
                    currentPage: 1,
                    pagination:{},
                    filter:{},
                },
                mounted(){
                    this.getMesaentrada();
                    
                },
                watch:{
                    currentPage:function(){
                        this.getMesaentrada();
                    }
                },
                // define methods under the `methods` object
                methods: {
                    getMesaentrada:function(){
                        
                        var self=this;
                        const params = new URLSearchParams();
                       params.append('nro', self.filter.nro);
                       params.append('fec', self.filter.fec);
                       params.append('categoria', self.filter.categoria);
                       axios.get('/apv1/mesaentrada?page='+self.currentPage,{params:self.filter})
                            .then(function (response) {
                                // handle success
                                console.log(response.data);
                                self.pagination.total = response.headers['x-pagination-total-count'];
                                self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                self.pagination.perPage = response.headers['x-pagination-per-page'];
                                self.entradas=response.data;
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
                        axios.delete('/apv1/mesaentrada/'+id)
                            .then(function (response) {
                                // handle success
                                console.log(response.data);
                                self.getMesaentrada();

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
                        window.location.href = '/mesaentrada/update?id='+key;

                    }

                  
                  }
                
              })
</script>

