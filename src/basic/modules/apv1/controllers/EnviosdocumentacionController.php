<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\EnviosdocumentacionSearch;
use Yii;
use yii\rest\ActiveController;
/**
 * Default controller for the `apv1` module
 */
class EnviosdocumentacionController extends ActiveController
{
    public $modelClass ="app\modules\apv1\models\Enviosdocumentacion";
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new EnviosdocumentacionSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}