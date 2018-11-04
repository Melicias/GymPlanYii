<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DificuldadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dificuldades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dificuldade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dificuldade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_dificuldade',
            'dificuldade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
