<?php

namespace api\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

/**
 * DificuldadeController implements the CRUD actions for Dificuldade model.
 */
class DificuldadeController extends ActiveController
{
    public $modelClass = 'common\models\Dificuldade';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }
}
