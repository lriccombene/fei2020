<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\EmpresaSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class EmpresaController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Empresa";


    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}