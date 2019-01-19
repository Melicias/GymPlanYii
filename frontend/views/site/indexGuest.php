<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Inicio';
?>
<div class="site-about" style="text-align: center">
    <img src="<?= Url::to('@web/images/logotipo.png')?>" height="125" width="125">
    <h1>Bem Vindo!</h1>

    <div style="text-align: center">
        <br><br><br><br>
        <h4>Para poder visualizar os treinos e ter acesso aos seus treinos deverá fazer o <?= Html::a('Login', ['site/login']) ?> ou o <?= Html::a('Registo', ['site/signup']) ?></h4>

    <h5> Para mais informações sobre o website <?= Html::a('clique aqui', ['site/about']) ?>.</h5>
    </div>
</div>