<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Usuario;

AppAsset::register($this);
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
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Actas de Inspeccion', 'url' => ['/actasinspeccion/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Dictamen Tecnico', 'url' => ['/dictamentecnico/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Env. Documentacion', 'url' => ['/enviosdocumentacion/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Mesa de Entrada', 'url' => ['/mesaentrada/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Notas Salida', 'url' => ['/notassalida/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Solid. Caratula', 'url' => ['/solicitudcaratula/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Parametros', 'items' => [
                ['label'=> 'Area', 'url' => ['/area/index']],
                ['label'=> 'Categoria', 'url' => ['/categoria/index']],
                ['label'=> 'Consultor', 'url' => ['/consultor/index']],
                ['label'=> 'Empresa', 'url' => ['/empresa/index']],
                ['label'=> 'Localidad', 'url' => ['/localidad/index']],
                ['label'=> 'Motivo', 'url' => ['/motivo/index']],
                ['label'=> 'Relevancia', 'url' => ['/relevancia/index']],
                ['label'=> 'Tipo Dictamen', 'url' => ['/tipodictamen/index']],
                ['label'=> 'Tipo trabajo', 'url' => ['/tipotrabajo/index']],
                ['label'=> 'Tipo tramite', 'url' => ['/tipotramite/index']],
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
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
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
