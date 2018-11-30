<?php

use common\models\Categoria;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'GymPlan';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Todos os Treinos</h1>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <?= $form->field($model, 'nome')->textInput() ?>
        </div>
        <div class="col-md-4 col-sm-6">
            <?= $form->field($model, 'id_dificuldade')->dropDownList(
                ArrayHelper::map($dificuldades, 'id_dificuldade', 'dificuldade'), ['prompt' => '']) ?>
        </div>
        <div class="col-md-4 col-sm-6">
            <?= $form->field($model, 'id_categoria')->dropDownList(
                ArrayHelper::map(Categoria::find()->asArray()->all(), 'id_categoria', 'nome'), ['prompt' => '']) ?>
        </div>
        <div class="col-sm-6 col-md-1">
            <br>
            <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <br><br>

    <div class="container-fluid cards-row">
        <div class="row">
            <?php $treinos = $dataProvider->getModels();
            for ($i = 0; $i < count($treinos); $i++) { ?>
                <div class="body-content col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h1 style="text-align: center"> <?= $treinos[$i]->nome ?></h1>
                            <div style="padding-left: 20px">
                                <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Dificuldade:</strong> <?= $treinos[$i]->dificuldade->dificuldade ?>
                                </p>
                                <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Categoria:</strong> <?= $treinos[$i]->categoria->nome ?>
                                </p>
                                <div style="height: 125px">
                                    <p style="font-size: 12px"><strong
                                                style="font-size: 14px">Descrição:</strong> <?= $treinos[$i]->descricao ?>
                                    </p>
                                </div>
                            </div>
                            <div style="text-align: right">
                                <?= Html::a('Visualizar Exercicios', ['visualizar'], ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php };

            ?>
        </div>
    </div>
</div>
