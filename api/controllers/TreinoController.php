<?php

namespace api\controllers;

use common\models\Categoria;
use common\models\Dificuldade;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;

/**
 * TreinoController implements the CRUD actions for Treino model.
 */
class TreinoController extends ActiveController
{
    ////http://127.0.0.1/GymPlanYii/api/web/treino
    public $modelClass = 'common\models\Treino';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }

    //http://127.0.0.1/GymPlanYii/api/web/treino/exercicios
    /*public function actionExercicios()
    {
        $treinoModel = new $this->modelClass;
        $recs = $treinoModel::find()->all();
        $arr = [];
        foreach($recs as $treino){
            $arr[] = ['treino' => $treino,'exercicios' => $treino->exercicios];
        }
        return $arr;
    }*/

    public function actionExercicioscd()
    {
        $treinoModel = new $this->modelClass;
        $recs = $treinoModel::find()->all();
        $arr = [];
        foreach($recs as $treino){
            $arr[] = ['treino' => $treino,'categoria' => Categoria::findOne(['id_categoria' => $treino->id_categoria]),'dificuldade' => Dificuldade::findOne(['id_dificuldade' => $treino->id_dificuldade]),'exercicios' => $treino->exercicios];
        }
        return $arr;
    }
}
