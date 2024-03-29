<?php

namespace backend\controllers;

use common\models\ZonaExercicio;
use Yii;
use common\models\Exercicio;
use common\models\ExercicioSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ExercicioController implements the CRUD actions for Exercicio model.
 */
class ExercicioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Exercicio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExercicioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exercicio model.
     * @param integer $id
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
     * Creates a new Exercicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exercicio();
        $modelZona = new ZonaExercicio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_exercicio]);
        }
        return $this->render('create', [
            'model' => $model,
            'modelZona' => $modelZona,
        ]);
    }

    /**
     * Updates an existing Exercicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelZona = new ZonaExercicio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_exercicio]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelZona' => $modelZona,
        ]);
    }

    /**
     * Deletes an existing Exercicio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $exercicio = $this->findModel($id);
        foreach ($exercicio->treinos as $treino) {
            $treino->unlink('exercicios', $exercicio, true);
        }
        $exercicio->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exercicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exercicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exercicio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSavezonaexercicio()
    {
        $model = new ZonaExercicio();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $model->save();
            return ['success' => $model];
        }

        $model = new Exercicio();
        $modelZona = new ZonaExercicio();

        return $this->render('create', [
            'model' => $model,
            'modelZona' => $modelZona,
        ]);
    }

    public function actionValidatezonaexercicio()
    {
        $model = new ZonaExercicio();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}
