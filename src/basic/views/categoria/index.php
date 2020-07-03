<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;


use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <div id='app'>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
         <!--    <b-pagination
            v-model="currentPage"
            :total-rows.number="pagination.total"
            :per-page.number="pagination.perPage"
            aria-controls="my-table"
            ></b-pagination> -->

                <p class="mt-3">Current Page: {{ currentPage }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Descripcion
                            </th>
                            <th>
                                
                            </th>
                            <th>
                         
                            </th>
                            <th>

                            </th>
                        </tr>
                        <tr>
                            <td >
                                <input v-on:change="getCategorias()" class="form-control" v-model="filter.id">
                            </td>
                            <td>
                                <input v-on:change="getCategorias()" class="form-control" v-model="filter.nombre">
                            </td>
                            <td>
                                <input v-on:change="getCategorias()" class="form-control" v-model="filter.descripcion">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(categoria,key) of categorias" v-bind:key="categoria.id">
                            <td scope="row">{{categoria.id}} </td>
                            <td>
                                {{categoria.nombre}}
                            </td>
                            <td>
                                {{categoria.descripcion}}
                            </td>
                            <td>
                               <button v-on:click ="editCategoria(categoria.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteCategoria(categoria.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        categorias:[],
                        categoria: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getCategorias();
                        
                    },
                    watch:{
                        currentPage:function(){
                            this.getCategorias();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getCategorias:function(){
                            var self=this;
                            const params = new URLSearchParams();
                           params.append('nombre', self.filter.nombre);
                           params.append('descripcion', self.filter.descripcion);


                            axios.get('/apv1/categoria?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    
                                    self.categorias=response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteCategoria:function(id){
                            var self=this;
                            axios.delete('/apv1/categoria/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getCategorias();

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editCategoria:function(key){
                            window.location.href = '/categoria/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>
