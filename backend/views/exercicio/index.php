<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\ZonaExercicio;
use common\models\Exercicio;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExercicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crie um Exercicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_exercicio',
            //'foto',
            'nome',
            [
                'attribute'=>'descricao',
                'format'=>'raw',
                'value'=>function($data){
                    return wordwrap($data->descricao,60,'<br>');
                },
                'contentOptions'=>['style'=>'max-width: 400px;']
            ],
            [
                'attribute'=>'id_zona',
                'filter'=>ArrayHelper::map(ZonaExercicio::find()->asArray()->all(), 'id_zona', 'nome'),
                'value' =>function($model){  return Exercicio::getZonaName($model->id_zona);},
            ],
            //'repeticoes',
            //'tempo',
            //'id_zona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
