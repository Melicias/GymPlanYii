<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Create Treino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_treino',
            'nome',
            'descricao',
            'id_categoria',
            'id_dificuldade',
            //'repeticoes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
