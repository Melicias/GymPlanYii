<?php
use yii\helpers\Html;

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

    <div class="body-content" >
        <div class="card">
            <?php /* <img  src="Meter Imagem" alt="Avatar" style="width:100%"> */ ?>
            <div class="container">
                <h4><b>Treino 1</b></h4>
                <p>Asd</p>
                <?= Html::submitButton('Começar Treino', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="body-content" >
        <div class="card">
            <?php /* <img  src="Meter Imagem" alt="Avatar" style="width:100%"> */ ?>
            <div class="container">
                <h4><b>Treino 2</b></h4>
                <p>Asd</p>
                <?= Html::submitButton('Começar Treino', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
