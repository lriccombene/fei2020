<?php

namespace app\controllers;

use Yii;
use app\models\Dictamentecnico;
use app\models\DictamentecnicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * DictamentecnicoController implements the CRUD actions for Dictamentecnico model.
 */
class DictamentecnicoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionPdf() {

           $dataProvider = $_SESSION['datos_filtrados']->getModels();
                 //var_dump($dataProvider);

              $pdf = new \Mpdf\Mpdf();
              $pdf->SetHeader('Dictamen Tecnico'.date("Y-m-d"). ' - Secretaria de ambiente y Cambio Climatico ');
              //$contador=count($dataProvider);
              $html='
                     <table align="center"><tr>
                     <td align="center"><b>LISTADO DE Dictamen Tecnico</b></td>
                     </tr></table>
                     <table class="detail-view2" repeat_header="1" cellpadding="1" cellspacing="1"
                     width="100%" border="0">
                     <tr class="principal">
                     <td class="principal" width="7%">&nbsp;<strong>Nro exp</strong></td>
                     <td class="principal" width="7%">&nbsp;<strong>Fecha</strong></td>
                     <td class="principal" width="19%">&nbsp;<strong>Area</strong></td>
                     <td class="principal" width="19%">&nbsp;<strong>Categoria</strong></td>
                     <td class="principal" width="19%">&nbsp;<strong>Tipo Dictamen</strong></td>
                     <td class="principal" width="19%">&nbsp;<strong>Tipo Trabajo</strong></td>
                     </tr>';

               $iSum = 0;
               $valor = 0;
               foreach ($dataProvider as  $obj){
                         $html=$html . '
                         <tr class="odd">
                           <td class="odd" width="7%">&nbsp;'.$obj->nro.'</td>
                           <td class="odd" width="7%">&nbsp;'.$obj->fec.'</td>
                           <td class="odd" width="19%">&nbsp;'.$obj->area->nombre.'</td>
                           <td class="odd" width="19%">&nbsp;'.$obj->categoria->nombre.'</td>
                           <td class="odd" width="19%">&nbsp;'.$obj->tipodictamen->nombre.'</td>
                           <td class="odd" width="10%">&nbsp;'.$obj->tipotrabajo->nombre.'</td>';
                         $html=$html .'</tr>';
                   }
             $html=$html .'</table>';
             $pdf->WriteHTML($html);
             $pdf->Output('DictamenTecnico.pdf', 'D');
            exit;
       }



    /**
     * Lists all Dictamentecnico models.
     * @return mixed
     */
    public function actionIndex()
    {
       /* $searchModel = new DictamentecnicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        */
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Dictamentecnico();
        return $this->render('index',[
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single Dictamentecnico model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dictamentecnico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Dictamentecnico();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dictamentecnico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dictamentecnico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dictamentecnico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dictamentecnico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if (($model = Dictamentecnico::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
