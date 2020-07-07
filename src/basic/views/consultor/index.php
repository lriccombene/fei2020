<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultores';
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
<div class="consultor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Consultor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   

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
                                Apellido
                            </th>
                            <th>
                                Telefono
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Domicilio
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
                                <input v-on:change="getConsultores()" class="form-control" v-model="filter.id">
                            </td>
                            <td>
                                <input v-on:change="getConsultores()" class="form-control" v-model="filter.nombre">
                            </td>
                            <td>
                                <input v-on:change="getConsultores()" class="form-control" v-model="filter.apellido">
                            </td>
                            <td>
                                <input v-on:change="getConsultores()" class="form-control" v-model="filter.telefono">
                            </td>
                            <td>
                                <input v-on:change="getConsultores()" class="form-control" v-model="filter.email">
                            </td>
                            <td>
                                <input v-on:change="getConsultores()" class="form-control" v-model="filter.domicilio">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(consul,key) of consultores" v-bind:key="consul.id">
                            <td scope="row">{{consul.id}} </td>
                            <td>
                                {{consul.nombre}}
                            </td>
                            <td>
                                {{consul.apellido}}
                            </td>
                            <td>
                                {{consul.telefono}}
                            </td>
                            <td>
                                {{consul.email}}
                            </td>
                            <td>
                                {{consul.domicilio}}
                            </td>
                            <td>
                               <button v-on:click ="editConsul(consul.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteConsul(consul.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        consultores:[],
                        consultor: {},
                        id:'',
                        currentPage: 1,
                        pagination:{},
                        filter:{},
                    },
                    mounted(){
                        this.getConsultores();
                        
                    },
                    watch:{
                        currentPage:function(){
                            this.getConsultores();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getConsultores:function(){
                            var self=this;
                            const params = new URLSearchParams();
                           params.append('nombre', self.filter.nombre);
                           params.append('apellido', self.filter.apellido);
                           params.append('telefono', self.filter.telefono);
                           params.append('email', self.filter.email);
                           params.append('domicilio', self.filter.domicilio);

                            axios.get('/apv1/consultor?page='+self.currentPage,{params:self.filter})
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.pagination.total = response.headers['x-pagination-total-count'];
                                    self.pagination.totalPages = response.headers['x-pagination-page-count'];
                                    self.pagination.perPage = response.headers['x-pagination-per-page'];
                                    self.consultores=response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteConsul:function(id){
                            var self=this;
                            axios.delete('/apv1/consultor/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getConsultores();
                               })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editConsul:function(key){
                            window.location.href = '/consultor/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>
