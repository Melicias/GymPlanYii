<?php

namespace api\controllers;

use common\models\Categoria;
use common\models\Dificuldade;
use common\models\Treino;
use common\models\User;
use frontend\models\UserTreino;
use Yii;
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

    public function actionTreinosbyuser(){
        $token = Yii::$app->request->get('access-token');
        $user = User::findIdentityByAccessToken($token);
        $arr = [];
        foreach($user->treinos as $treino){
            $arr[] = ['treino' => $treino,'categoria' => Categoria::findOne(['id_categoria' => $treino->id_categoria]),'dificuldade' => Dificuldade::findOne(['id_dificuldade' => $treino->id_dificuldade]),'exercicios' => $treino->exercicios];
        }
        return $arr;
        //return $user->treinos;
    }

    public function actionAdicionartreino(){
        $token = Yii::$app->request->get('access-token');
        $idTreino = Yii::$app->request->get('id-treino');
        $user = User::findIdentityByAccessToken($token);
        $ut = UserTreino::findOne(['id_treino' => $idTreino,'id_user'=>$user->id]);
        if($ut == null){
            $ut = new UserTreino();
            $ut->id_treino = $idTreino;
            $ut->id_user = Yii::$app->user->id;
            $ut->save();
            return 'sucesso';
        }else{
            return 'erro';
        }
    }

    public function actionRemovertreino(){
        $request = \Yii::$app->getRequest();
        $token = Yii::$app->request->get('access-token');
        $user = User::findIdentityByAccessToken($token);
        $idTreino = $request->get('id-treino');
        $ut = UserTreino::findOne(['id_treino' => $idTreino,'id_user'=>$user->id]);
        if($ut == null){
            return 'erro';
        }else{
            $ut->delete();
            return 'sucesso';
        }
    }
}
