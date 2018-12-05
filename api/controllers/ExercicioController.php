<?php

namespace api\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

/**
 * ExercicioController implements the CRUD actions for Exercicio model.
 */
class ExercicioController extends ActiveController
{
    public $modelClass = 'common\models\Exercicio';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }
}
