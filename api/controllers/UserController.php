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

    public function init(){
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
                'class' => HttpBasicAuth::className(),
                'auth' => function ($email, $password) {
                    $user = User::findByEmail($email);
                    if ($user && $user->validatePassword($password)) {
                        return $user;
                    }
                }
        ];
        return $behaviors;
    }

    public function actionUser()
    {
        //$email = \Yii::$app->request->queryParams;
        $email = Yii::$app->user->identity;
        return [$email];
    }

}
