<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
                      ['position'=>View::POS_HEAD]);
/* @var $this yii\web\View */
/* @var $model app\models\Actasinspeccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actasinspeccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nro')->textInput() ?>

    <?= $form->field($model, 'fec')->textInput() ?>

    <?= $form->field($model, 'id_localidad')->textInput() ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <?= $form->field($model, 'id_motivo')->textInput() ?>

    <?= $form->field($model, 'id_empresa')->textInput() ?>

    <?= $form->field($model, 'id_area')->textInput() ?>

    <?= $form->field($model, 'latitud')->textInput() ?>

    <?= $form->field($model, 'longitud')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="area-form " >


    <form  id="app"   method="post">


    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <label for="nro">Nro :</label>
		</div>
		<div class="col-md-8">

            <input v-bind:placeholder="nro_hint" id="nro" v-model="nro" type="text" name="nro" required >
            
		</div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="fec">Fec :</label>
        </div>
        <div class="col-md-8">
            <input v-bind:placeholder="fec_hint"  id="fec" v-model="fec" type="date" name="fec">
        </div>
	</div>
    <div class="row">
		<div class="col-md-2">
            <label for="localidad">Localidad :</label>
        </div>
        <div class="col-md-8">
        <select v-model="selected" required >
            <option v-for="option in localidades" v-bind:value="option.id">
                {{ option.nombre }}
            </option>
        </select>
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
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </div>

    </form>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrerse nro',
                        fec:'<?php  echo ($model->fec); ?>',
                        fec_hint: 'ingrerse fec',
                        selected: '<?php  echo ($model->id_localidad); ?>',
                        localidades: [
                                { id: '1', nombre: 'Localidad1' },
                                { id: '2', nombre: 'Localidad2' },
                                { id: '3', nombre: 'Localidad3' }
                               ],
                        selected_categoria: '<?php  echo ($model->id_categoria); ?>',
                        categorias: [
                                { id: '1', nombre: 'categoria1' },
                                { id: '2', nombre: 'categoria2' },
                                { id: '3', nombre: 'categoria3' }
                               ]
                    }
                   
                  })
</script>