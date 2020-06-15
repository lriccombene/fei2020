<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notassalida */
/* @var $form yii\widgets\ActiveForm */
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
?>

<div class="notassalida-form">

    <form  id="app"   method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <label for="fec_emision">Fecha emision:</label>
                </div>
                <div class="col-md-8">
                    <input v-bind:placeholder="fec_emision" id="fec_emision" v-model="fec_emision" type="date" name="fec_emision" required >
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label for="fec_notificado">Fecha notificacion :</label>
                </div>
                <div class="col-md-8">
                    <input v-bind:placeholder="fec_notificado_hint"  id="fec_notificado" v-model="fec_notificado" type="date" name="fec_notificado">
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
                    <label for="detalle">Detalle :</label>
                </div>
                <div class="col-md-8">
                    <textarea v-bind:placeholder="detalle_hint"  id="detalle" v-model="detalle" type="text" name="detalle"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="notificado">Notificado :</label>
                </div>
                <div class="col-md-8">
                    <input v-bind:placeholder="notificado_hint"  id="notificado" v-model="notificado" type="text" name="notificado">
                </div>
            </div>
        </div>
    </form>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                      fec_emision: '<?php  echo ($model->fec_emision); ?>',
                      fec_emision_hint: 'ingrerse fecha emision',
                      fec_notificado:'<?php  echo ($model->fec_notificado); ?>',
                      fec_notificado_hint: 'ingrerse fec notificado',
                      selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                      categorias: [
                                { id: '1', nombre: 'categoria1' },
                                { id: '2', nombre: 'categoria2' },
                                { id: '3', nombre: 'categoria3' }
                               ],
                      selected_empresa: '<?php  echo ($model->id_empresa); ?>',
                      empresas: [
                                { id: '1', nombre: 'empresa1' },
                                { id: '2', nombre: 'empresa2' },
                                { id: '3', nombre: 'empresa3' }
                               ],
                      detalle: '<?php  echo ($model->detalle); ?>',
                      detalle_hint: 'ingrerse detalle',
                      notificado: '<?php  echo ($model->notificado); ?>',
                      notificado_hint: 'ingrerse notificado'
                        }
                    })

</script>