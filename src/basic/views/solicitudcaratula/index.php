<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudcaratulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
$this->title = 'Solicitud de caratulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudcaratula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Solicitud de caratula', ['create'], ['class' => 'btn btn-success']) ?>
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
                                Fecha
                            </th>
                            <th>
                                Extracto
                            </th>
                            <th>
                                Recibido
                            </th>
                            <th>
                                
                            </th>
                            <th>
                         
                            </th>
                            <th>

                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input v-on:change="getCaratulas()" class="form-control" v-model="filter.id">
                            </td>
                            <td >
                                <input v-on:change="getCaratulas()" class="form-control" v-model="filter.fec">
                            </td>
                            <td>
                                <input v-on:change="getCaratulas()" class="form-control" v-model="filter.extracto">
                            </td>
                            <td>
                                <input v-on:change="getCaratulas()" class="form-control" v-model="filter.recibido">
                            </td>

                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(caratula,key) of caratulas" v-bind:key="caratula.id">
                            <td scope="row">{{caratula.id}} </td>
                            <td>
                                {{caratula.fec}}
                            </td>
                            <td>
                                {{caratula.extracto}}
                            </td>
                            <td>
                                {{caratula.recibido}}
                            </td>
                            <td>
                               <button v-on:click ="editCara(caratula.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteCara(caratula.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        caratulas:[],
                        caratula: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getCaratulas();
                        
                    },
                    watch:{
                        currentPage:function(){
                            this.getCaratulas();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getCaratulas:function(){
                           var self=this;
                           const params = new URLSearchParams();
                           params.append('fec', self.filter.fec);
                           params.append('extracto', self.filter.extracto);
                           params.append('recibido', self.filter.recibido);

                           axios.get('/apv1/solicitudcaratula?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    
                                    self.caratulas=response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteCara:function(id){
                            var self=this;
                            axios.delete('/apv1/solicitudcaratula/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getCaratulas();

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editCara:function(key){
                            window.location.href = '/solicitudcaratula/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>
