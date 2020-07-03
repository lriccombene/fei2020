<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\Tipotramite;
use app\modules\apv1\models\TipotramiteSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class TipotramiteController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Tipotramite";
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new Tipotramite();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}
