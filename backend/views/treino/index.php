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

            [
                'attribute'=>'id_treino',
                'contentOptions'=>['style'=>'vertical-align: middle;']
            ],
            [
                'attribute'=>'nome',
                'contentOptions'=>['style'=>'text-align:center;vertical-align: middle;']
            ],
            [
                'attribute'=>'descricao',
                'format'=>'raw',
                'value'=>function($data){
                    return wordwrap($data->descricao,60,'<br>');
                },
                'contentOptions'=>['style'=>'max-width: 400px;']
            ],
            [
                'attribute'=>'id_categoria',
                'filter'=>ArrayHelper::map(Categoria::find()->asArray()->all(), 'id_categoria', 'nome'),
                'value' =>function($model){  return Treino::getCategoriaName($model->id_categoria);},
                'contentOptions'=>['style'=>'text-align:center;vertical-align: middle;']
            ],
            [
                'attribute'=>'id_dificuldade',
                'filter'=>ArrayHelper::map(Dificuldade::find()->asArray()->all(), 'id_dificuldade', 'dificuldade'),
                'value' =>function($model){  return Treino::getDificuldadeDificuldade($model->id_dificuldade);},
                'contentOptions'=>['style'=>'text-align:center;vertical-align: middle;']
            ],
            //'repeticoes',
            [
                'label' => 'Exercicios',
                'value' =>function($model){return count($model->exercicios);},
                'contentOptions'=>['style'=>'text-align:center;vertical-align: middle;']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    var_dump(Yii::$app->request->queryParams);
    ?>

</div>
