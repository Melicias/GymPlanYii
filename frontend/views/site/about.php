<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Sobre';
?>
<div class="site-about" style="text-align: center">
    <img src="<?= Url::to('@web/images/logotipo.png')?>" height="125" width="125">
    <h1>Sobre o GymPlan:</h1>

    <div style="text-align: left">
        <h4><b>O que fazemos?</b></h4>
        <h5 style="padding-left:2em">&emsp;&emsp; Nós disponibilizamos vários tipos de treinos para várias partes do corpo com uma escolha
        de dificuldade e de categoria.</h5>

        <h4><b>Aplicação movel?</b></h4>
        <h5 style="padding-left:2em">&emsp;&emsp; Existe uma aplicação para android para download brevemente.</h5>
    </div>

</div>
