<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\Localidad;
use app\modules\apv1\models\LocalidadSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class LocalidadController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Localidad";
    
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new Localidad();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}