<?php

namespace api\controllers;

use common\models\Categoria;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class CategoriaController extends ActiveController
{
    public $modelClass = 'common\models\Categoria';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }

    public function actionCategoriasordenadas(){
        $categorias = Categoria::find()->orderBy('nome')->all();
        return $categorias;
    }
}
