<?php

namespace api\controllers;

use yii\rest\ActiveController;

/**
 * TreinoController implements the CRUD actions for Treino model.
 */
class TreinoController extends ActiveController
{
    ////http://127.0.0.1/GymPlanYii/api/web/treino
    public $modelClass = 'common\models\Treino';

    //http://127.0.0.1/GymPlanYii/api/web/treino/exercicios
    public function actionExercicios()
    {

        $treinoModel = new $this->modelClass;
        $recs = $treinoModel::find()->all();
        $arr = [];
        foreach($recs as $treino){
            $arr[] = [$treino,'exercicios' => $treino->exercicios];
        }
        return [$arr];
    }

    //http://127.0.0.1/GymPlanYii/api/web/treino?fields=id_treino,nome&expand=exercicio
    public function fields()
    {
        return ['id_treino', 'nome'];
    }

    public function extraFields()
    {
        return ['exercicios'];
    }
}
