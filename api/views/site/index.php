<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

$this->title = 'GymPlan Admin';

?>
<div class="index">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="panel panel-default">
        <div class="panel-heading">Adicionar</div>
        <div class="panel-body">
            <p>
                <?= Html::a('Treinos', ['treino/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Exercicios', ['exercicio/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Zonas exercicio', ['zona-exercicio/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Dificuldades', ['dificuldade/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Categorias', ['categoria/create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Visualizar</div>
        <div class="panel-body">
            <p>
                <?= Html::a('Treinos', ['treino/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Exercicios', ['exercicio/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Zonas exercicio', ['zona-exercicio/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Dificuldades', ['dificuldade/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Categorias', ['categoria/index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <p>

    </p>
</div>