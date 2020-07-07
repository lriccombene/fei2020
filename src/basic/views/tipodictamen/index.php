<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipodictamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo dictamenes';
$this->params['breadcrumbs'][] = $this->title;

use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" ,['position'=>View::POS_HEAD]);


$this->registerJsFile("https://polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>View::POS_HEAD]);


$this->registerJsFile("https://unpkg.com/vue@latest/dist/vue.min.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>View::POS_HEAD]);


$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>View::POS_HEAD]);


?>
<div class="tipodictamen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tipo dictamen', ['create'], ['class' => 'btn btn-success']) ?>
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
                                <input v-on:change="getTipodictamenes()" class="form-control" v-model="filter.id">
                            </td>
                            <td>
                                <input v-on:change="getTipodictamenes()" class="form-control" v-model="filter.nombre">
                            </td>
                            <td>
                                <input v-on:change="getTipodictamenes()" class="form-control" v-model="filter.descripcion">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(tipodictamen,key) of tipodictamenes" v-bind:key="tipodictamen.id">
                            <td scope="row">{{tipodictamen.id}} </td>
                            <td>
                                {{tipodictamen.nombre}}
                            </td>
                            <td>
                                {{tipodictamen.descripcion}}
                            </td>
                            <td>
                               <button v-on:click ="editTipodictamen(tipodictamen.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteTipodictamen(tipodictamen.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        tipodictamenes:[],
                        tipodictamen: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getTipodictamenes();
                    },
                    watch:{
                        currentPage:function(){
                            this.getTipodictamenes();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getTipodictamenes:function(){
                            var self=this;
                            const params = new URLSearchParams();
                            params.append('nombre', self.filter.nombre);
                            params.append('descripcion', self.filter.descripcion);
                            axios.get('/apv1/tipodictamen?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    self.tipodictamenes=response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteTipodictamen:function(id){
                            var self=this;
                            axios.delete('/apv1/tipodictamen/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getTipodictamenes();
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editTipodictamen:function(key){
                            window.location.href = '/tipodictamen/update?id='+key;
                        }
                      }
                  })
</script>