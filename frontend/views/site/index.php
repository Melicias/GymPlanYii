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
        <table width="100%" border="0" style="border:none;">
            <tr>
                <td><label>Nome: </label><input type="text" name="nome" /></td>
                <td><label>Dificuldade: </label><select><?php foreach ($dificuldades as $dificuldade){?> <option value="<?=$dificuldade->id_dificuldade?>"><?=$dificuldade->dificuldade?></option><?php } ?></select></td>
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
            <div id="container_index" class="container">
              <h1> <?=$treinos[$i]->nome?></h1>
                <h4>Dificuldade: </h4><p><?=$treinos[$i]->dificuldade->dificuldade?></p>
                <h4>Categoria: </h4><p><?=$treinos[$i]->categoria->nome?></p>

                <?= Html::submitButton('Visualizar Treino', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php };?>
</div>
