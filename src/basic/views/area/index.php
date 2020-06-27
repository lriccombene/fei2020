<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel app\models\AreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Area';
$this->params['breadcrumbs'][] = $this->title;


use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>View::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

?>
<div class="area-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<div id='app'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                    </thead>
                    <tbody>
                        <tr v-for="(area,key) of areas" v-bind:key="area.id">
                            <td scope="row">{{area.id}} </td>
                            <td>
                                {{area.nombre}}
                            </td>
                            <td>
                                {{area.descripcion}}
                            </td>
                            <td>
                               <button v-on:click ="editArea(area.id)" type ="button" class="btn btn-warning">Editor</button>
                            </td>
                            <td>
                               <button v-on:click ="deleteArea(area.id)" type ="button" class="btn btn-danger">Borrar</button>
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
                        areas:[],
                        area: {},
                        id:'',
                        currentPage:1,
                        pagination:{},
                        filters:{},
                    },
                    mounted(){
                        this.getAreas();
                        
                    },
                    watch:{
                        currentPage:function(){
                            this.getAreas();
                        }
                    },
                    // define methods under the `methods` object
                    methods: {
                        getAreas:function(){
                            var self=this;
                            axios.get('/apv1/area')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.areas=response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        deleteArea:function(id){
                            var self=this;
                            axios.delete('/apv1/area/'+id)
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    self.getAreas();

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);

                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        editArea:function(key){
                            window.location.href = '/area/update?id='+key;

                        }

                      
                      }
                    
                  })
</script>