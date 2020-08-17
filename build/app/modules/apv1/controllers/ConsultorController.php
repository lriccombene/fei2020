<?php

namespace app\modules\apv1\controllers;
use Yii;
use yii\rest\ActiveController;
use app\modules\apv1\models\ConsultorSearch;

/**
 * Default controller for the `apv1` module
 */
class ConsultorController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Consultor";
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new ConsultorSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}