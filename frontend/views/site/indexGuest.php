<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Inicio';
?>
<div class="site-about" style="text-align: center">

    <h1>Bem Vindo!</h1>
    <div style="text-align: center">
        <br><br><br><br><h4>Para aceder ao site faça o registo ou se já o fez por favor faça Login de modo a aceder a toda a informação sobre o WebSite</h4>

    <h3><?= Html::a('Sobre nós', ['site/about']) ?></h3>
    </div>
</div>