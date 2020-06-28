<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActasinspeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actas inspeccion';
$this->params['breadcrumbs'][] = $this->title;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>
<div class="actasinspeccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Actas inspeccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nro',
            'fec',
            'id_localidad',
            'id_categoria',
            //'id_motivo',
            //'id_empresa',
            //'id_area',
            //'latitud',
            //'longitud',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


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
                            id
                            </th>
                            <th>
                            nro
                            </th>
                            <th>
                            fec
                            </th>
                            <th>
                            localidad
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
                                <input v-on:change="getActas()" class="form-control" v-model="filter.nro">
                            </td>
                            <td>
                                <input v-on:change="getActas()" class="form-control" v-model="filter.fec">
                            </td>
                            <td>
                                <input v-on:change="getActas()" class="form-control" v-model="filter.id_localidad">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(acta,key) of actas" v-bind:key="acta.id">
                        <td scope="row">{{acta.id}} </td>
                            <td>
                                {{acta.nro}}
                            </td>
                            <td>
                                {{acta.fec}}
                            </td>
                            <td>
                                {{acta.localidad.nombre}}
                            </td>
                            <td>
                               <button v-on:click ="editActas(acta.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteActas(acta.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        actas:[],
                        acta: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getActas();
                        
                    },
                    watch:{
                        currentPage:function(){
                           // this.getAreas();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getActas:function(){
                            var self=this;
                            const params = new URLSearchParams();
                           params.append('nro', self.filter.nro);
                           params.append('fec', self.filter.fec);


                            axios.get('/apv1/actasinspeccion?page='+self.currentPage,{params:params})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    
                                    self.actas=response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteActas:function(id){
                            var self=this;
                            axios.delete('/apv1/actasinspeccion/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getActas();

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editActas:function(key){
                            window.location.href = '/actasinspeccion/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>

