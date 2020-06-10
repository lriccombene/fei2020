<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_consultor')->textInput() ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referente')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <div id="app">
            <h1>Nombre : </h1>
            <input v-bind:placeholder="nombre_hint" v-model="nombre" maxlength ='true' v-if="mostrar"> <br>
        
            <h1>descripcion : </h1>
            <input v-bind:placeholder="descripcion_hint" v-model="descripcion"  maxlength ='true' v-if="mostrar"> <br>
            
            <h1>consultor : </h1>
            <select v-model="consultores" v-if="mostrar">
                <option disabled value="">Seleccione un elemento</option>
                <option v-for="consultor in consultores"> >{{consultor.nombre}}</option>
             </select>
           
            <h1>telefono : </h1>
            <input v-bind:placeholder="telefono_hint" v-model="telefono"  maxlength ='true' v-if="mostrar"> <br>


            <h1>razon social : </h1>
            <input v-bind:placeholder="razon_social" v-model="razon_social"  maxlength ='true' v-if="mostrar"> <br>

            <h1>contacto : </h1>
            <input v-bind:placeholder="contacto" v-model="contacto"  maxlength ='true' v-if="mostrar"> <br>

            <h1>referente : </h1>
            <input v-bind:placeholder="contacto" v-model="contacto"  maxlength ='true' v-if="mostrar"> <br>

            <button @click="agregarConsultor" class = 'btn btn-success' >Agregar consultor</button><br>
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
            telefono: '',
            telefono_hint:"ingrese telefono",
            razon_social: '',
            razon_social_hint:"ingrese razon social",
            contacto: '',
            contacto_hint:"ingrese contacto",
            referente: '',
            contacto_hint:"ingrese referente",
            mostrar: true,

            consultores:[
                {id:"1",nombre:'test6661'},
                {id:"2",nombre:'test6662'},
                      ]

          
        },
        agregarConsultor(){
               this.nombre = ""
               this.descripcion = ""

            }


        
    })
</script>
