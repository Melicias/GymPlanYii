<?php

use common\models\Categoria;
use common\models\Treino;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Os Seus Treinos</h1>
    </div>

    <form action="" method="post">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <label>Nome: </label>
                <input class="form-control" type="text" name="nome" />
            </div>
            <div class="col-md-4 col-sm-6">
                <label>Dificuldade: </label>
                <select class="form-control">
                    <option value="0">Nenhuma</option>
                    <?php foreach ($dificuldades as $dificuldade){?>
                        <option value="<?=$dificuldade->id_dificuldade?>"><?=$dificuldade->dificuldade?></option><?php } ?>
                </select>
            </div>
            <div class="col-md-4 col-sm-6">
                <label>Categoria: </label><select class="form-control">
                    <option value="0">Nenhuma</option>
                    <?php foreach ($categorias as $categoria){?>
                        <option value="<?=$categoria->id_categoria?>"><?=$categoria->nome?></option><?php } ?>
                </select>
            </div>
            <div class="col-sm-6 col-md-1">
                <br>
                <input class="btn btn-default btn-primary" type="submit" name="submit" value="Pesquisar" />
            </div>
        </div>
    </form>

    <br><br>
    <div class="container-fluid cards-row">
        <div class="row">
            <?php for($i = 0;$i<count($treinos);$i++){ ?>
            <div class="body-content col-sm-6 col-md-4" >
                <div class="thumbnail">
                    <div class="caption">
                        <h1 style="text-align: center"> <?=$treinos[$i]->nome?></h1>
                        <div style="padding-left: 20px">
                            <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Dificuldade:</strong> <?=$treinos[$i]->dificuldade->dificuldade?></p>
                            <p class="card-description" style="font-size: 16px"><strong style="font-size: 18px">Categoria:</strong> <?=$treinos[$i]->categoria->nome?></p>
                            <div style="height: 125px">
                                <p style="font-size: 12px"><strong style="font-size: 14px">Descrição:</strong> <?=$treinos[$i]->descricao?></p>
                            </div>
                        </div>
                        <div style="text-align: right">
                            <input class="btn btn-default btn-primary" style="" type="submit" name="submit" value="Visualizar treino" />
                        </div>
                    </div>
                </div>
            </div>
            <?php };?>
        </div>
    </div>
</div>
