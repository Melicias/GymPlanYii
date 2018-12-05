<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=Html::beginForm(['bloquear-users'],'post');?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
            'primeiroNome',
            'ultimoNome',
            'email',
            [
                'attribute'=>'status',
                'filter'=>[0 => 'Bloqueado',10 => 'Desbloqueado'],
                'value' =>function($model){  return $model->status == 10 ? 'Desbloqueado' : 'Bloqueado';},
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
    <?=Html::submitButton('Bloquear', ['name' => 'bloquear','class' => 'btn btn-danger']);?>
    <?=Html::submitButton('Desbloquear', ['name' => 'desbloquear','class' => 'btn btn-success']);?>
    <?= Html::endForm();?>
</div>
