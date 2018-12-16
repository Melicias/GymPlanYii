<?php

namespace api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    //http://127.0.0.1/GymPlanYii/api/web/user/update?id=3

    //http://127.0.0.1/GymPlanYii/api/web/user/update?id=3 //&access-token=scnE9GebFoOk5Xl_UGjzqrIj3SUXn3ip

    public function init(){
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function actionLogin()
    {
        $user = User::findByEmail(Yii::$app->request->post('email'));
        if($user->validatePassword(Yii::$app->request->post('password'))){
           return $user;
        }
        return [false];
    }

    public function actionSignup()
    {
        $user = new User();
        $user->primeiroNome = Yii::$app->request->post('primeiroNome');
        $user->ultimoNome = Yii::$app->request->post('ultimoNome');
        $user->email = Yii::$app->request->post('email');
        $user->dataNascimento = Date("Y-m-d H:i:s", strtotime( Yii::$app->request->post('data')));
        $user->peso =  Yii::$app->request->post('peso');
        $user->altura =  Yii::$app->request->post('altura');
        $user->sexo = Yii::$app->request->post('sexo');

        $user->setPassword(Yii::$app->request->post('password'));
        $user->generateAuthKey();

        return $user->save() ? $user : $user;
    }

}
