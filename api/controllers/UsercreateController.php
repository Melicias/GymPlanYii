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
class UsercreateController extends ActiveController
{
    public $modelClass = 'common\models\User';

    protected function verbs()
    {
        return [
            'create' => ['POST'],
        ];
    }

    public function init(){
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

}
