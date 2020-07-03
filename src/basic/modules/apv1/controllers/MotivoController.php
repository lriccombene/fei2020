<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\Motivo;
use app\modules\apv1\models\MotivoSearch;
use Yii;


use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class MotivoController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Motivo";
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new Motivo();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}