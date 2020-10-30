<?php

namespace app\modules\apv1\controllers;
use Yii;
use app\modules\apv1\models\NotassalidaSearch;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class NotassalidaController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Notassalida";
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new NotassalidaSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}