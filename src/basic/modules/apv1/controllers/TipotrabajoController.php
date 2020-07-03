<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\Tipotrabajo;
use app\modules\apv1\models\TipotrabajoSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class TipotrabajoController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Tipotrabajo";
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new Tipotrabajo();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}