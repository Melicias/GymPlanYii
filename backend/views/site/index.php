<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

$this->title = 'GymPlan Admin';

?>
<div class="index">

    <div class="panel panel-default">
        <div class="panel-heading text-center">Visualizar</div>
        <div class="panel-body text-center">
            <p>
                <?= Html::a('Treinos', ['treino/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Exercícios', ['exercicio/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Zonas exercício', ['zona-exercicio/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Dificuldades', ['dificuldade/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Categorias', ['categoria/index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading text-center">Adicionar</div>
        <div class="panel-body text-center">
            <p>
                <?= Html::a('Treinos', ['treino/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Exercícios', ['exercicio/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Zonas exercício', ['zona-exercicio/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Dificuldades', ['dificuldade/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Categorias', ['categoria/create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <p>

    </p>
</div>