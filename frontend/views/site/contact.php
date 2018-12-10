<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact"  style="text-align: center">

    <h1>
       Contactos de todos os Personal Trainers:
    </h1>

    <div class="row">
        <?php
        foreach ($admins as $admin){ ?>
        <div class="body-content col-sm-4 col-md-3">
            <b><h3><?=$admin->primeiroNome?> <?=$admin->ultimoNome?></b></h4><?=$admin->email?>
        </div>
        <?php }  ?>
    </div>

</div>
