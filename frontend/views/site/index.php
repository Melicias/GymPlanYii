<?php

use common\models\Categoria;
use common\models\Treino;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<style>
    .card {
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 400px;
        height: 300px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }
</style>

<div class="site-index">

    <div class="jumbotron">
        <h1>Os Seus Treinos</h1>
    </div>

    <form action="" method="post">
        <table width="100%" border="0" style="border:none;">
            <tr>
                <td><label>Nome: </label><input type="text" name="nome" /></td>
                <td><label>Dificuldade: </label><input type="text" name="dificuldade" /></td>
                <td><label>Categoria: </label><input type="text" name="categoria" /></td>
                <td><input class="button" type="submit" name="submit" value="Search" /></td>
            </tr>
        </table>
        <br><br>
    </form>
    <?php for($i = 0;$i<count($treinos);$i++){ ?>
    <div class="body-content" >
                <div class="card">
            <?php /* <img  src="Meter Imagem" alt="Avatar" style="width:100%"> */ ?>
            <div class="container">
              <h1> <?=$treinos[$i]->nome?></h1>
                <h4>Dificuldade: </h4><p><?=$treinos[$i]->dificuldade->dificuldade?></p>
                <h4>Categoria: </h4><p><?=$treinos[$i]->categoria->nome?></p>

                <?= Html::submitButton('Visualizar Treino', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php };?>
</div>
