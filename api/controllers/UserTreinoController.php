<?php

namespace api\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class UserTreinoController extends ActiveController
{
    public $modelClass = 'frontend\models\UserTreino';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }
}
