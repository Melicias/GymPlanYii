<?php
namespace frontend\controllers;

use common\models\Admin;
use common\models\Categoria;
use common\models\Dificuldade;
use common\models\Treino;
use common\models\TreinoSearch;
use common\models\User;
use frontend\models\AccountForm;
use frontend\models\PanelWidget;
use frontend\models\ShowExerciciosForm;
use frontend\models\UserTreino;
use frontend\models\UserTreinoSearch;
use frontend\models\VisualizarForm;
use Yii;
use yii\base\InvalidParamException;
use yii\base\BaseObject;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','visualizar-treino','account'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','visualizar-treino','account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'index' => ['get','post'],
                    'login' => ['post','get'],
                    'contact' => ['get'],
                    'about' => ['get'],
                    'signup' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->render('indexGuest');
        }else{
            $treinos = Treino::find()->all();
            $searchModel = new TreinoSearch();
            $searchModel->load(Yii::$app->request->post());
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $categorias = Categoria::find()->orderBy('nome')->all();
            $dificuldades = Dificuldade::find()->orderBy('dificuldade')->all();

            return $this->render('index', [
                'categorias' => $categorias,
                'dificuldades' => $dificuldades,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'treinos' => $treinos,

            ]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';


            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionVisualizarTreino($id){

        $model = Treino::findOne(['id_treino' => $id]);
        //var_dump(Yii::$app->request->post('visualizarTreino'));
        if(!is_null( Yii::$app->request->post('visualizarTreino'))){
            return $this->render('visualizarTreino', [
                'model' => $model
            ]);
        }
        /*if(!is_null(Yii::$app->request->post('adicionarTreino'))){
            echo "a";
        }*/
    }

    public function actionRemoverTreino($id){

        $request = \Yii::$app->getRequest();
        $idTreino = $request->get('id');
        $ut = UserTreino::findOne(['id_treino' => $idTreino,'id_user'=>Yii::$app->user->id]);
        $ut->delete();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $treino = Treino::findOne(['id_treino' => $idTreino]);
        return 'O treino ' . $treino->nome . ' foi removido com sucesso.';
    }


    public function actionAdicionarTreino($id){

        $request = \Yii::$app->getRequest();
        $idTreino = $request->get('id');
        $ut = UserTreino::findOne(['id_treino' => $idTreino,'id_user'=>Yii::$app->user->id]);
        $treino = Treino::findOne(['id_treino' => $idTreino]);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if($ut == null){
            $ut = new UserTreino();
            $ut->id_treino = $idTreino;
            $ut->id_user = Yii::$app->user->id;
            //$ut->load(['id_treino' => $idTreino, 'id_user' => Yii::$app->user->id]);
            $ut->save();
            return 'O treino ' . $treino->nome . ' foi adicionado com sucesso.';
        }else{
            return 'O treino ' . $treino->nome . ' já está guardado nos seus treinos.';
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $admin = Admin::find()->all();

        return $this->render('contact', [
            'admins' => $admin,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
         return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /*public function actionAccount(){
        $model = new AccountForm();
        return $this->render('account', [
            'model' => Yii::$app->user->identity,
        ]);
    }*/

    public function actionAccount(){
        $user = User::findIdentity(Yii::$app->user->id);
        if($user->load(Yii::$app->request->post())){
            if($user->validate()){
                $user->save();
                return $this->render('account', [
                    'model' => $user,
                ]);

            }
        }
        return $this->render('account', [
            'model' => Yii::$app->user->identity,
        ]);
    }

    public function actionShowExercicios()
    {
        $treinos = Treino::find()->all();
        return $this->render('show_exercicios', [
            'treinos' => $treinos,

        ]);
    }

    public function actionPanelWidget()
    {
        $model = new PanelWidget();
        return $this->render('index', [
            'model' => $model,
        ]);


    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword()
    {

        try {
            $model = new ResetPasswordForm();
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);

    }

    public function actionMeustreinos()
    {
        $user = User::findIdentity(Yii::$app->user->id);
        $treinos = $user->treinos;
        $searchModel = new UserTreinoSearch();
        $searchModel->load(Yii::$app->request->post());
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categorias = Categoria::find()->orderBy('nome')->all();
        $dificuldades = Dificuldade::find()->orderBy('dificuldade')->all();

        return $this->render('meusTreinos', [
            'categorias' => $categorias,
            'dificuldades' => $dificuldades,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'treinos' => $treinos,

        ]);
    }

}
