<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div> <?php 

    //aca  armamos los permisos para que se vean o no el menu y la opcion Parametros
    $banderita=FALSE;
    if(Yii::$app->user->isGuest ){}
    else{
        if(Yii::$app->user->identity->username === "admin")
        {
            $banderita=TRUE;
        }
    } 

            
       
        
        
    ?></div>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "Sistema SEPYDS",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Actas de Inspección', 'url' => ['/actasinspeccion/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Dictamen Técnico', 'url' => ['/dictamentecnico/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Env. Documentación', 'url' => ['/enviosdocumentacion/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Mesa de Entrada', 'url' => ['/mesaentrada/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Notas Salida', 'url' => ['/notassalida/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Solid. Cáratula', 'url' => ['/solicitudcaratula/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Párametros', 'items' => [
                ['label'=> 'Área', 'url' => ['/area/index']],
                ['label'=> 'Categoría', 'url' => ['/categoria/index']],
                ['label'=> 'Consultor', 'url' => ['/consultor/index']],
                ['label'=> 'Empresa', 'url' => ['/empresa/index']],
                ['label'=> 'Localidad', 'url' => ['/localidad/index']],
                ['label'=> 'Motivo', 'url' => ['/motivo/index']],
                ['label'=> 'Relevancia', 'url' => ['/relevancia/index']],
                ['label'=> 'Tipo Dictamen', 'url' => ['/tipodictamen/index']],
                ['label'=> 'Tipo Trabajo', 'url' => ['/tipotrabajo/index']],
                ['label'=> 'Tipo Trámite', 'url' => ['/tipotramite/index']],
                ['label'=> 'Yacimiento', 'url' => ['/yacimiento/index']],
            ] ,'visible'=> $banderita],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">

        <?= $content ?>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; SEPYDS <?= date('Y') ?></p>

        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>