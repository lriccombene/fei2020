<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DictamentecnicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

$this->title = 'Dictamentecnicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictamentecnico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dictamentecnico', ['create'], ['class' => 'btn btn-success']) ?>
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
                            id
                            </th>
                            <th>
                            nro
                            </th>
                            <th>
                            fec
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
                                <input v-on:change="getDictamen()" class="form-control" v-model="filter.nro">
                            </td>
                            <td>
                                <input v-on:change="getDictamen()" class="form-control" v-model="filter.fec">
                            </td>
                            <td>
                                <input v-on:change="getDictamen()" class="form-control" v-model="filter.categoria">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(dict,key) of dictamenes" v-bind:key="dict.id">
                        <td scope="row">{{empresa.id}} </td>
                            <td>
                                {{dict.nro}}
                            </td>
                            <td>
                                {{dict.fec}}
                            </td>
                            <td>
                                {{dict.consultor.categoria}}
                            </td>
                            <td>
                               <button v-on:click ="edit(dict.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="delete(dict.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        dictamenes:[],
                        dict: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getDictamen();
                        
                    },
                    watch:{
                        currentPage:function(){
                           // this.getAreas();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getDictamen:function(){
                            
                            var self=this;
                            const params = new URLSearchParams();
                           params.append('nro', self.filter.nro);
                           params.append('fec', self.filter.fec);
                           params.append('categoria', self.filter.categoria);


                            axios.get('/apv1/dictamentecnico?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    
                                    self.dictamenes=response.data;

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
                            axios.delete('/apv1/dictamentecnico/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getDictamen();

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
                            window.location.href = '/dictamentecnico/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>