<?php

namespace api\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

/**
 * ZonaExercicioController implements the CRUD actions for ZonaExercicio model.
 */
class ZonaExercicioController extends ActiveController
{
    public $modelClass = 'common\models\ZonaExercicio';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }
}
