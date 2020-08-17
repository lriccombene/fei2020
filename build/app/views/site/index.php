<?php

/* @var $this yii\web\View */

$this->title = 'Sistema SEPYDS';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido !</h1>

        <p class="lead"> SISTEMA de la Secretaria Estado de Planificacion y Desarrollo Sustentable</p>

        <p><a class="btn btn-lg btn-success" href="/site/login">Ingresar</a></p>
    </div>

    <div class="body-content">

    <?php

$url = Yii::getAlias("@web") . '/img/';
/*//background-image: url(<?= $url ?>logo.png);*/
?>
<style>
body {
    background-color: #4E9A06;

}
</style>

    </div>
</div>
