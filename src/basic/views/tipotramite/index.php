<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipotramiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipotramites';
$this->params['breadcrumbs'][] = $this->title;


use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);


?>
<div class="tipotramite-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipotramite', ['create'], ['class' => 'btn btn-success']) ?>
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
                                <input v-on:change="getTipotramites()" class="form-control" v-model="filter.id">
                            </td>
                            <td>
                                <input v-on:change="getTipotramites()" class="form-control" v-model="filter.nombre">
                            </td>
                            <td>
                                <input v-on:change="getTipotramites()" class="form-control" v-model="filter.descripcion">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(tipotramite,key) of tipodictamenes" v-bind:key="tipotramite.id">
                            <td scope="row">{{tipotramite.id}} </td>
                            <td>
                                {{tipotramite.nombre}}
                            </td>
                            <td>
                                {{tipotramite.descripcion}}
                            </td>
                            <td>
                               <button v-on:click ="editTipotramite(tipotramite.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteTipotramite(tipotramite.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        tipotramite: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getTipotramites();
                    },
                    watch:{
                        currentPage:function(){
                           // this.getAreas();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getTipotramites:function(){
                            var self=this;
                            const params = new URLSearchParams();
                            params.append('nombre', self.filter.nombre);
                            params.append('descripcion', self.filter.descripcion);
                            axios.get('/apv1/tipotramite?page='+self.currentPage,{params:params})
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
                        deleteTipotramite:function(id){
                            var self=this;
                            axios.delete('/apv1/tipotramite/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getTipotramites();
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editTipotramite:function(key){
                            window.location.href = '/tipotramite/update?id='+key;
                        }
                      }
                  })
</script>