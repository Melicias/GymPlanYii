<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\Categoria;
use common\models\Dificuldade;
use common\models\Treino;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TreinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treinos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="treino-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crie um Treino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_treino',
            'nome',
            'descricao',
            [
                'attribute'=>'id_categoria',
                'filter'=>ArrayHelper::map(Categoria::find()->asArray()->all(), 'id_categoria', 'nome'),
                'value' =>function($model){  return Treino::getCategoriaName($model->id_categoria);},
            ],
            [
                'attribute'=>'id_dificuldade',
                'filter'=>ArrayHelper::map(Dificuldade::find()->asArray()->all(), 'id_dificuldade', 'dificuldade'),
                'value' =>function($model){  return Treino::getDificuldadeDificuldade($model->id_dificuldade);},
            ],
            //'repeticoes',
            [
                'label' => 'Exercicios',
                'value' =>function($model){return count($model->exercicios);} ,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
