<?php

namespace frontend\controllers;

use Yii;
use app\models\Tickets;
use app\models\respuesta;
use app\models\TicketsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketsController implements the CRUD actions for Tickets model.
 */
class TicketsController extends Controller
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

    /**
     * Lists all Tickets models.
     * @return mixed
     */
    public function actionReportes()
    {
        
		$searchModel = new TicketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('reportes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
 

    }

    public function actionFin(){
        
        return $this->renderAjax('fin');
    }

    public function actionFinalizar(){
        
        return $this->renderAjax('Finalizar');
    }

    public function actionRespuesta(){
        $model = new respuesta();



        if ($model->load(Yii::$app->request->post()) && $model->save()){
    

            return $this->redirect(['site/index']);
        }

        return $this->renderAjax('respuesta', [
            'model' => $model,
        ]);
    }
    /**
     * Displays a single Tickets model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tickets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tickets();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->mailer->compose(['html' => 'newticket-html'])
                 ->setFrom('sistemas@plastyquim.com')
                 ->setTo('sistemas@plastyquim.com')
                 ->setSubject('Se ha Creado un nuevo Ticket')
                 ->send();
            return $this->redirect(['site/index', 'id' => $model->Nro_Ticket]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tickets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Nro_Ticket]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tickets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tickets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tickets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tickets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
