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
<<<<<<< HEAD
    
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

=======
   public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
       //$actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
>>>>>>> 922a71671565850c9b0c5b983be8c1b087ea6d1c
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new ActasinspeccionSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}
