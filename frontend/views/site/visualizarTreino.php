<?php

use common\models\Categoria;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* ArrayHelper::map(Categoria::find()->asArray()->all(), 'exercicio', 'nome'),['prompt' => '']) */
$this->title = 'GymPlan';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1><?=$model->nome;?></h1>

        <br><p><strong>&emsp;Descrição: </strong><?=$model->descricao;?></p>
        <p><strong>&emsp;Categoria: </strong><?=$model->getCategoriaName($model->id_categoria);?></p>
        <p><strong>&emsp;Dificuldade: </strong><?=$model->getDificuldadeDificuldade($model->id_dificuldade);?></p>
        <p><strong>&emsp;Número de repetições: </strong><?=$model->repeticoes;?></p>

    </div>
    <div class="container-fluid cards-row">
        <div class="row">
            <?php
            if($model->exercicios != null){
                for($i = 0;$i<count($model->exercicios);$i++){?>
                   <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <object class=".img-responsive" height="250px" data="<?=$model->exercicios[$i]->foto;?>" type="image/png" style="width:100%;">
                                <img src="https://dubsism.files.wordpress.com/2017/12/image-not-found.png" alt="Imagem não disponivel" style="width:100%; display:block">
                            </object>
                            <div class="caption">
                                <h3 style="text-align: center"><?=$model->exercicios[$i]->nome;?></h3>
                                <p class="card-description"><strong>Zona de treino: </strong><?=$model->exercicios[$i]->getZonaNameInExercicio();?></p>
                                <p class="card-description" style="height: 80px;"><?=$model->exercicios[$i]->descricao;?></p>
                                <?php
                                if($model->exercicios[$i]->tempo != null){
                                    ?>
                                    <p class="card-description"><strong>Tempo: </strong><?=$model->exercicios[$i]->tempo;?> segundos</p>
                                    <?php
                                }else{ ?>
                                    <p class="card-description"><strong>Repeticoes: </strong><?=$model->exercicios[$i]->repeticoes;?></p>
                                <?php } ?>
                                <br>
                            </div>
                        </div>
                    </div>
                <?php }
            }else{?>
                <h2>Não existem exercicios neste treino</h2>
            <?php }
            ?>
        </div>
    </div>

</div>