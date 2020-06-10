<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <div id="app">
    <h1>Nombre : </h1>
    <input v-bind:placeholder="nombre_hint" v-model="nombre" maxlength ='true' v-if="mostrar"> <br>
 
    <h1>Descripcion : </h1>
    <input v-bind:placeholder="descripcion_hint" v-model="descripcion"  maxlength ='true' v-if="mostrar"> <br>
    <button @click="agregarArea" class = 'btn btn-success' @key.enter="agregarArea" >Agregar Area</button><br>
    </div>
    <?php ActiveForm::end(); ?>


</div>


<script>
    var app = new Vue({
        el: '#app',
        data: {
            nombre: '',
            nombre_hint: 'ingrerse nombre',
            descripcion: '',
            descripcion_hint:"ingrese descripcion",
            mostrar: true,
          
        },
            agregarArea(){
               this.nombre = ""
               this.descripcion = ""
            }


        
    })
</script>