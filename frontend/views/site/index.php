<?php

use common\models\Categoria;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'GymPlan';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Todos os Treinos</h1>
    </div>
    <?php
    $treinos = $dataProvider->getModels();
    if (count($treinos) > 0){

    $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <?= $form->field($searchModel, 'nome')->textInput() ?>
        </div>
        <div class="col-md-4 col-sm-6">
            <?= $form->field($searchModel, 'id_dificuldade')->dropDownList(
                ArrayHelper::map($dificuldades, 'id_dificuldade', 'dificuldade'), ['prompt' => '']) ?>
        </div>
        <div class="col-md-4 col-sm-6">
            <?= $form->field($searchModel, 'id_categoria')->dropDownList(
                ArrayHelper::map($categorias, 'id_categoria', 'nome'), ['prompt' => '']) ?>
        </div>
        <div class="col-sm-6 col-md-1">
            <br>
            <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-success', 'style' => 'background-color: #9BC1BC1; color:#000000']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<br><br>

<div class="container-fluid cards-row">
    <div class="row">

        <?php
        for ($i = 0; $i < count($treinos); $i++) { ?>
            <?= Html::beginForm(['visualizar-treino', 'id' => $treinos[$i]->id_treino], 'post'); ?>
            <div class="body-content col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h2 style="height: 70px;text-align: center"> <?= $treinos[$i]->nome ?></h2>
                        <div style="padding-left: 20px">
                            <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Dificuldade:</strong> <?=$treinos[$i]->dificuldade->dificuldade ?>
                            </p>
                            <p class="card-description" style="height: 55px;font-size: 16px"><strong style="font-size: 18px">Categoria:</strong> <?= $treinos[$i]->categoria->nome ?>
                            </p>
                            <div class="card-description" style="height: 125px;font-size: 16px">
                                <p style="font-size: 16px">
                                    <strong style="font-size: 16px">Descrição:</strong> <?= $treinos[$i]->descricao ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="pull-left" style="padding-left: 20px">
                                <button id="adicionarTreino" data-id="<?=$treinos[$i]->id_treino?>" name='adicionarTreino' class="adicionarTreino" style= 'border: none;background-position: center center;width:40px; height:40px; background:url(<?= Url::to('@web/images/plus.png')?>);background-repeat: no-repeat;' type="button"></button>
                            </div>
                            <div class="pull-right" style="padding-right: 20px">
                                <?= Html::submitButton('Visualizar Treino', ['name' => 'visualizarTreino','class' => 'btn btn-success', 'style' => 'background-color: #9BC1BC1; color:#000000']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= Html::endForm(); ?>
        <?php }
        } else { ?>
           <div style="text-align: center">
               <h2> Não existem Treinos disponiveis</h2>
           </div>
        <?php }
        ?>
    </div>
</div>
</div>
