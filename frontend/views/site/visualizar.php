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
        <h1>Todos os Treinos</h1>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid cards-row">
        <div class="row">
            <?php $model = $dataProvider->getModels();
            for ($i = 0; $i < count($model); $i++) { ?>
                <div class="body-content col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h1 style="text-align: center"> Exercicio <?= $model[$i]->id_exercicio ?></h1>
                            <div style="padding-left: 20px">
                                <object class=".img-responsive" height="250px" data="<?=$model[$i]->foto;?>" type="image/png" style="width:100%;">
                                    <img src="https://dubsism.files.wordpress.com/2017/12/image-not-found.png" alt="Imagem não disponivel" style="width:100%; display:block">
                                </object>
                                <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Nome:</strong> <?= $model[$i]->nome ?>
                                </p>
                                <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Descrição:</strong> <?= $model[$i]->descricao ?>
                                </p>
                                <?php if($model[$i]->tempo != null){
                                ?>
                                <p class="card-description">Tempo:<?=$model[$i]->tempo;?> segundos</p>
                                <?php
                                }else{ ?>
                                <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Repetições:</strong> <?= $model[$i]->repeticoes ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>