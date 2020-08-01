<?php

use yii\helpers\Html;
use yii\grid\GridView;
Yii::$app->params['boostrap']=4;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSearch */
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


$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Empresa', ['create'], ['class' => 'btn btn-success']) ?>
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
                            nombre
                            </th>
                            <th>
                            Razon Social
                            </th>
                            <th>
                            descripcion
                            </th>
                            <th>
                            consultor
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
                                <input v-on:change="getEmpresas()" class="form-control" v-model="filter.nombre">
                            </td>
                            <td>
                                <input v-on:change="getEmpresas()" class="form-control" v-model="filter.razon_social">
                            </td>
                            <td>
                                <input v-on:change="getEmpresas()" class="form-control" v-model="filter.descripcion">
                            </td>
                            <td>
                                <input v-on:change="getEmpresas()" class="form-control" v-model="filter.consultor">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(empresa,key) of empresas" v-bind:key="empresa.id">
                        <td scope="row">{{empresa.id}} </td>
                            <td>
                                {{empresa.nombre}}
                            </td>
                            <td>
                                {{empresa.razon_social}}
                            </td>
                            <td>
                                {{empresa.descripcion}}
                            </td>
                            <td>
                                {{empresa.consultor.nombre}}
                            </td>
                            <td>
                               <button v-on:click ="edit(empresa.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="delete(empresa.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        empresas:[],
                        empresa: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getEmpresas();
                        
                    },
                    watch:{
                        currentPage:function(){
                            this.getEmpresas();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getEmpresas:function(){
                            
                            var self=this;
                            const params = new URLSearchParams();
                           params.append('nombre', self.filter.nombre);
                           params.append('descripcion', self.filter.descripcion);
                           params.append('consultor', self.filter.consultor);
                           params.append('razon_social', self.filter.razon_social);


                            axios.get('/apv1/empresa?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    
                                    self.empresas=response.data;

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
                            axios.delete('/apv1/empresa/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getEmpresas();

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
                            window.location.href = '/empresa/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>

