<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
?>

<div class="consultor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <div id="app">
            <h1>Nombre : </h1>
            <input v-bind:placeholder="nombre_hint" v-model="nombre" maxlength ='true' v-if="mostrar"> <br>
        
            <h1>apellido : </h1>
            <input v-bind:placeholder="apellido_hint" v-model="apellido"  maxlength ='true' v-if="mostrar"> <br>

            <h1>telefono : </h1>
            <input v-bind:placeholder="telefono_hint" v-model="telefono"  maxlength ='true' v-if="mostrar"> <br>

            <h1>email : </h1>
            <input v-bind:placeholder="email_hint" v-model="email"  maxlength ='true' v-if="mostrar"> <br>

            <h1>domicilio : </h1>
            <input v-bind:placeholder="domicilio_hint" v-model="domicilio"  maxlength ='true' v-if="mostrar"> <br>

            <button @click="agregarConsultor" class = 'btn btn-success' >Agregar Consultor</button><br>
        </div>


    <?php ActiveForm::end(); ?>

</div>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            nombre: '',
            nombre_hint: 'ingrerse nombre',
            apellido: '',
            apellido_hint:"ingrese apellido",
            telefono: '',
            telefono_hint:"ingrese telefono",
            email: '',
            email_hint:"ingrese email",
            domicilio: '',
            domicilio_hint:"ingrese domicilio",
            mostrar: true,
          
        },
        agregarConsultor(){
               this.nombre = ""
               this.apellido = ""
               this.telefono = ""
               this.email = ""
               this.domicilio = ""
            }


        
    })
</script>
