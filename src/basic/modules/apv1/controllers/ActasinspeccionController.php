<?php

namespace app\modules\apv1\controllers;
use app\modules\apv1\models\ActasinspeccionSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class ActasinspeccionController extends ActiveController
{
    
    public $modelClass ="app\modules\apv1\models\Actasinspeccion";
    
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new ActasinspeccionSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}
