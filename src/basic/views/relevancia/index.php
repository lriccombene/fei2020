<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelevanciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);


$this->title = 'Relevancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relevancia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Relevancia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                            <input v-on:change="getMotivos()" class="form-control" v-model="filter.id">
                        </td>
                        <td>
                            <input v-on:change="getMotivos()" class="form-control" v-model="filter.nombre">
                        </td>
                        <td>
                            <input v-on:change="getMotivos()" class="form-control" v-model="filter.descripcion">
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(motivo,key) of relevancias" v-bind:key="relevancia.id">
                        <td scope="row">{{motivo.id}} </td>
                        <td>
                            {{motivo.nombre}}
                        </td>
                        <td>
                            {{motivo.descripcion}}
                        </td>
                        <td>
                           <button v-on:click ="editMotivo(relevancia.id)" type ="button" class="btn btn-warning">Editor</button>
                        </td>
                        <td>
                           <button v-on:click ="deleteMotivo(relevancia.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                    relevancias:[],
                    relevancia: {},
                    id:'',
                    currentPage: 1,
                    pagination:{},
                    filter:{},
                },
                mounted(){
                    this.getMotivos();
                    
                },
                watch:{
                    currentPage:function(){
                        this.getMotivos();
                    }
                },
                // define methods under the `methods` object
                methods: {
                    getMotivos:function(){
                        var self=this;
                        const params = new URLSearchParams();
                       params.append('nombre', self.filter.nombre);
                       params.append('descripcion', self.filter.descripcion);


                        axios.get('/apv1/relevancia/?page='+self.currentPage,{params:self.filter})
                            .then(function (response) {
                                // handle success
                                console.log(response.data);
                                self.pagination.total = response.headers['x-pagination-total-count'];
                                self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                self.pagination.perPage = response.headers['x-pagination-per-page'];
                                
                                self.relevancias=response.data;

                            })
                            .catch(function (error) {
                                // handle error
                                console.log(error);

                            })
                            .then(function () {
                                // always executed
                            });
                    },
                    deleteMotivo:function(id){
                        var self=this;
                        axios.delete('/apv1/relevancia/'+id)
                            .then(function (response) {
                                // handle success
                                console.log(response.data);
                                self.getMotivos();

                            })
                            .catch(function (error) {
                                // handle error
                                console.log(error);

                            })
                            .then(function () {
                                // always executed
                            });
                    },
                    editMotivo:function(key){
                        window.location.href = '/relevancia/update?id='+key;

                    }

                  
                  }
                
              })
</script>