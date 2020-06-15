<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mesaentrada */
/* @var $form yii\widgets\ActiveForm */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
?>

<div class="mesaentrada-form">


    <form  id="app"   method="post">


        <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <label for="fec">Fecha :</label>
            </div>
            <div class="col-md-8">

                <input v-bind:placeholder="fec" id="fec" v-model="fec" type="date" name="fec" required >
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label for="fec_ingreso">Fecha ingreso :</label>
            </div>
            <div class="col-md-8">
                <input v-bind:placeholder="fec_ingreso_hint"  id="fec_ingreso" v-model="fec_ingreso" type="date" name="fec_ingreso">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="categoria">Categoria :</label>
            </div>
            <div class="col-md-8">
            <select v-model="selected_categoria" required >
                <option v-for="option in categorias" v-bind:value="option.id">
                    {{ option.nombre }}
                </option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label for="tramite">Tramite :</label>
            </div>
            <div class="col-md-8">
            <select v-model="selected_tramite" required >
                <option v-for="option in tramites" v-bind:value="option.id">
                    {{ option.nombre }}
                </option>
            </select>
            </div>
        </div>
        <div class="row">
                <div class="col-md-2">
                    <label for="empresa">Empresa :</label>
                </div>
            <div class="col-md-8">
                <select v-model="selected_empresa" required >
                    <option v-for="option in empresas" v-bind:value="option.id">
                        {{ option.nombre }}
                    </option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="descripcion">Descripcion :</label>
                </div>
                <div class="col-md-8">
                    <textarea v-bind:placeholder="descripcion_hint"  id="descripcion" v-model="descripcion" type="text" name="descripcion"></textarea>
                </div>
        </div>
    </form>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                      fec: '<?php  echo ($model->fec); ?>',
                      fec_hint: 'ingrerse fecha',
                      fec_ingreso:'<?php  echo ($model->fec_ingreso); ?>',
                      fec_ingreso_hint: 'ingrerse descripcion',
                      selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                      categorias: [
                                { id: '1', nombre: 'categoria1' },
                                { id: '2', nombre: 'categoria2' },
                                { id: '3', nombre: 'categoria3' }
                               ],
                      selected_tramite: '<?php  echo ($model->id_tramite); ?>',
                      tramites: [
                                { id: '1', nombre: 'tramite1' },
                                { id: '2', nombre: 'tramite2' },
                                { id: '3', nombre: 'tramite3' }
                               ],
                      selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                      empresas: [
                                { id: '1', nombre: 'empresa1' },
                                { id: '2', nombre: 'empresa2' },
                                { id: '3', nombre: 'empresa3' }
                               ],
                      descripcion: '<?php  echo ($model->descripcion); ?>',
                      descripcion_hint: 'ingrerse descripcion'



                    }
                   
                  })

</script>