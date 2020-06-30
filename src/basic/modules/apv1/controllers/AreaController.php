<?php

namespace app\modules\apv1\controllers;

use app\modules\apv1\models\Area;
use app\modules\apv1\models\AreaSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class AreaController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Area";

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new Area();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }

}
