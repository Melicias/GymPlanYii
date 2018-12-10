<?php

namespace backend\controllers;

use common\models\ExercicioSearch;
use common\models\ExerciciosNotOnTreinoSearch;
use Yii;
use common\models\Treino;
use common\models\TreinoSearch;
use common\models\Exercicio;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreinoController implements the CRUD actions for Treino model.
 */
class TreinoController extends Controller
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
                    'index' => ['GET'],
                    'remove-exerciciotreino' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Treino models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TreinoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Treino model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new ExercicioSearch();
        $dataProvider = $searchModel->searchWithinTreino(Yii::$app->request->queryParams,$this->findModel($id));

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModelExercicio' => $searchModel,
            'dataProviderExercicio' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Treino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Treino();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_treino]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Treino model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_treino]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAddExerciciotreino($id)
    {
        $model = $this->findModel($id);
        //$user->link('markets', $market);
        $selection=(array)Yii::$app->request->post('selection');
        foreach($selection as $idExercicio){
            $exercicio = Exercicio::findOne(['id_exercicio' => $idExercicio]);
            $model->link('exercicios', $exercicio);
        }

        $searchModel = new ExercicioSearch();
        $dataProvider = $searchModel->searchWithinTreino(Yii::$app->request->queryParams,$this->findModel($id));

        return $this->render('view', [
            'model' => $model,
            'searchModelExercicio' => $searchModel,
            'dataProviderExercicio' => $dataProvider,
        ]);
    }

    public function actionRemoveExerciciotreino($idExercicio, $id)
    {
        $model = $this->findModel($id);
        $exercicio = Exercicio::findOne(['id_exercicio' => $idExercicio]);
        $model->unlink('exercicios',$exercicio, true);

        $searchModel = new ExercicioSearch();
        $dataProvider = $searchModel->searchWithinTreino(Yii::$app->request->queryParams,$this->findModel($id));

        return $this->render('view', [
            'model' => $model,
            'searchModelExercicio' => $searchModel,
            'dataProviderExercicio' => $dataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        $treino = $this->findModel($id);
        foreach ($treino->exercicios as $exercicio) {
            $treino->unlink('exercicios', $exercicio, true);
        }
        $treino->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Treino model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Treino the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Treino::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
