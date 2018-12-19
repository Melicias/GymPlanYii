<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\ZonaExercicio;
use common\models\Exercicio;

/* @var $this yii\web\View */
/* @var $model common\models\Treino */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="treino-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_treino], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_treino], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende apagar o treino criado?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_treino',
            'nome',
            'descricao',
            [
                'label' => 'Categoria',
                'value' => $model->getCategoriaName($model->id_categoria),
            ],
            [
                'label' => 'Dificuldade',
                'value' => $model->getDificuldadeDificuldade($model->id_dificuldade),
            ],
            'repeticoes',
        ],
    ]);
    ?>

    <?=Html::beginForm(['add-exerciciotreino', 'id' => $model->id_treino],'post');?>
    <?= GridView::widget([
        'dataProvider' => $dataProviderExercicio,
        'filterModel' => $searchModelExercicio,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id_exercicio',
            'nome',
            [
                'attribute'=>'id_zona',
                'filter'=>ArrayHelper::map(ZonaExercicio::find()->asArray()->all(), 'id_zona', 'nome'),
                'value' =>function($model){  return Exercicio::getZonaName($model->id_zona);},
            ],
        ],
    ]); ?>
    <?=Html::submitButton('Adicionar exercicios', ['class' => 'btn btn-info']);?>
    <?= Html::endForm();?>

    <h2>Exercicios: </h2>
    <br><br>
    <div class="container-fluid cards-row">
        <div class="row">

    <?php
    if($model->exercicios != null){
        for($i = 0;$i<count($model->exercicios);$i++){?>
            <?=Html::beginForm(['remove-exerciciotreino', 'idExercicio' => $model->exercicios[$i]->id_exercicio, 'id' => $model->id_treino],'post');?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <object class=".img-responsive" height="250px" data="<?=$model->exercicios[$i]->foto;?>" type="image/png" style="width:100%;">
                        <img src="https://dubsism.files.wordpress.com/2017/12/image-not-found.png" alt="Imagem não disponivel" style="width:100%; display:block">
                    </object>
                    <div class="caption">
                        <h3 style="text-align: center"><?=$model->exercicios[$i]->nome;?></h3>
                        <p class="card-description">Zona de treino:<?=$model->exercicios[$i]->getZonaNameInExercicio();?></p>
                        <p class="card-description" style="height: 80px;"><?=$model->exercicios[$i]->descricao;?></p>
                        <?php
                            if($model->exercicios[$i]->tempo != null){
                            ?>
                                <p class="card-description">Tempo:<?=$model->exercicios[$i]->tempo;?> segundos</p>
                            <?php
                            }else{ ?>
                                <p class="card-description">Repeticoes:<?=$model->exercicios[$i]->repeticoes;?></p>
                            <?php } ?>
                        <br>
                        <?=Html::submitButton('Remover exercicio', ['class' => 'btn btn-danger',]);?>
                    </div>
                </div>
            </div>
            <?= Html::endForm();?>
        <?php }
         }
     ?>
        </div>
    </div>



</div>
