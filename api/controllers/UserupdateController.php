<?php

namespace api\controllers;

use common\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserupdateController extends ActiveController
{
    public $modelClass = 'common\models\User';

    //http://127.0.0.1/GymPlanYii/api/web/user/update?id=3&access-token=scnE9GebFoOk5Xl_UGjzqrIj3SUXn3ip
    protected function verbs()
    {
        return [
            'update' => ['PUT', 'PATCH'],
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }

}
